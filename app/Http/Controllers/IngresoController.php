<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ingreso;

use App\Staff;

use App\Viviente;

use App\Http\Traits\CampamentoTrait;

class IngresoController extends Controller
{
    private $campamentoId;
    /**
     * Create a new controller instance and validation of user auth.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->campamentoId = CampamentoTrait::campamentoActual();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos = Ingreso::all();
        $ingresosArray = array();
        $ingresoArray = array();
        foreach ($ingresos as $ingreso) {
            if($ingreso->campamento->id== $this->campamentoId){
                $ingresoArray['fecha'] = $ingreso->fecha;
                $ingresoArray['staffVivienteOtro'] = $ingreso->staffVivienteOtro;
                if($ingreso->staffVivienteOtro == 'staff'){
                    $ingresoArray['nombrePersona'] = $ingreso->staff->nombre." ".$ingreso->staff->apellidoPaterno." ".$ingreso->staff->apellidoMaterno;
                }else{
                    if($ingreso->staffVivienteOtro == 'viviente'){
                        $ingresoArray['nombrePersona'] = $ingreso->viviente->nombre." ".$ingreso->viviente->apellidoPaterno." ".$ingreso->viviente->apellidoMaterno;
                    }else{
                        if($ingreso->staffVivienteOtro == 'otro'){
                            $ingresoArray['nombrePersona'] = $ingreso->otro;
                        }
                    }
                }
                $ingresoArray['metodoDePago'] = $ingreso->metodoDePago;

                $ingresoArray['monto'] = $ingreso->monto;
                $ingresoArray['comentarios'] = $ingreso->comentarios;
                $ingresoArray['id'] = $ingreso->id;
                array_push($ingresosArray, $ingresoArray);

            }
        }
        return $ingresosArray;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingreso = new Ingreso();
        $ingreso->campamento_id = $this->campamentoId;
        $ingreso->fecha = $request->fecha;
        $ingreso->staffVivienteOtro = $request->staffVivienteOtro;

        if($request->staffVivienteOtro == "staff"){
            $ingreso->staff_id = $request->staff;
            $staff = Staff::find($ingreso->staff_id);
            $totalStaff = 0;
            foreach ($staff->campamento as $campa) {
                if($campa->id == $this->campamentoId){
                    $totalStaff = $campa->pivot->pagado;
                }
            }
            $totalStaff += $request->monto;
            $staff->campamento()->updateExistingPivot($this->campamentoId, ['pagado'=>$totalStaff]);
        }else{
            if($request->staffVivienteOtro == "viviente"){
                $ingreso->viviente_id = $request->viviente;
                $viviente = Viviente::find($ingreso->viviente_id);
                $viviente->pagado += $request->monto;
                $viviente->save();
            }else{
                if($request->staffVivienteOtro == "otro"){
                    $ingreso->otro = $request->otro;
                }
            }
        }
        $ingreso->metodoDePago = $request->metodoDePago;
        $ingreso->monto = $request->monto;

        $ingreso->save();
        flash('Ingreso registrado exitosamente','success');
        return redirect('/finanzas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingreso = Ingreso::find($id);
        return view('finanzas/editIngreso')->with('ingreso', $ingreso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingreso = Ingreso::find($id);
        if($ingreso->staffVivienteOtro == "staff"){
            $staff = Staff::find($ingreso->staff_id);
            $totalStaff = 0;
            foreach ($staff->campamento as $campa) {
                if($campa->id == $this->campamentoId){
                    $totalStaff = $campa->pivot->pagado;
                }
            }
            $totalStaff -= $ingreso->monto;
            $staff->campamento()->updateExistingPivot($this->campamentoId, ['pagado'=>$totalStaff]);
        }else{
            if($ingreso->staffVivienteOtro == "viviente"){
                $viviente = Viviente::find($ingreso->viviente_id);
                $viviente->pagado -= $ingreso->monto;
                $viviente->save();
            }
        }
        $ingreso->delete();

        if($ingreso->delete()){
            flash('Ingreso eliminado exitosamente','success');
            return redirect('/finanzas');
        }else{
            flash('Ingreso error al eliminar','success');
            return redirect('/finanzas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function totalIngresos()
    {
        $ingresos = Ingreso::all();
        $suma = 0;
        foreach ($ingresos as $ingreso) {
            if($ingreso->campamento->id== $this->campamentoId){
                $suma += $ingreso->monto;
            }
        }
        return $suma;
    }
}
