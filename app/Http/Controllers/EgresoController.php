<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Egreso;

use App\Http\Traits\CampamentoTrait;

class EgresoController extends Controller
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
        $egresos = Egreso::all();
        $egresosArray = array();
        $egresoArray = array();
        foreach ($egresos as $egreso) {
            if($egreso->campamento->id == $this->campamentoId){
                $egresoArray['fecha'] = $egreso->fecha;
                $egresoArray['area'] = $egreso->area->area;
                $egresoArray['nombrePersona'] = $egreso->staff->nombre." ".$egreso->staff->apellidoPaterno;
                $egresoArray['descripcion'] = $egreso->descripcion;
                $egresoArray['monto'] = $egreso->monto;
                $egresoArray['id'] = $egreso->id;
                array_push($egresosArray, $egresoArray);
            }
        }
        return $egresosArray;
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
        $egreso = new Egreso();
        $egreso->campamento_id = $this->campamentoId;
        $egreso->fecha = $request->fecha;
        $egreso->area_id = $request->area;
        $egreso->staff_id = $request->staff;
        $egreso->descripcion = $request->descripcion;
        $egreso->monto = $request->monto;

        $egreso->save();
        flash('Egreso registrado exitosamente','success');
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
        $egreso = Egreso::find($id);
        return view('finanzas/editEgreso')->with('egreso', $egreso);
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
        $egreso = Egreso::find($id);
        if(isset($request->fecha))
            $egreso->fecha = $request->fecha;

        if(isset($request->area))
            $egreso->area_id = $request->area;

        if(isset($request->staff))
            $egreso->staff_id = $request->staff;

        if(isset($request->descripcion))
            $egreso->descripcion = $request->descripcion;

        if(isset($request->monto))
            $egreso->monto = $request->monto;

        $egreso->save();
        flash('Egreso modificado exitosamente','success');
        return redirect('/finanzas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $egreso = Egreso::find($id);

        if($egreso->delete()){
            flash('Egreso eliminado exitosamente','success');
            return redirect('/finanzas');
        }else{
            flash('Egreso error al eliminar','danger');
            return redirect('/finanzas');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function totalEgresos()
    {
        $egresos = Egreso::all();
        $suma = 0;
        foreach ($egresos as $egreso) {
            if($egreso->campamento->id== $this->campamentoId){
                $suma += $egreso->monto;
            }
        }
        return $suma;
    }
}
