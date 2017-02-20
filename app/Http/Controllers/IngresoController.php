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
        //dd($request);
        $ingreso->campamento_id = $this->campamentoId;
        $ingreso->fecha = $request->fecha;
        $ingreso->staffVivienteOtro = $request->staffVivienteOtro;

        if($request->staffVivienteOtro == "staff"){
            $ingreso->staff_id = $request->staff;
        }else{
            if($request->staffVivienteOtro == "viviente"){
                $ingreso->viviente_id = $request->viviente;
            }else{
                if($request->staffVivienteOtro == "otro"){
                    $ingreso->otro = $request->otro;
                }
            }
        }
        $ingreso->metodoDePago = $request->metodoDePago;
        $ingreso->monto = $request->monto;

        $ingreso->save();
        flash($ingreso->nombre.' creado exitosamente','success');
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
        //
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
        //
    }
}
