<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Campamento;

use App\Http\Requests\CampamentoRequest;

use Carbon\Carbon;

class CampamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campamentos = Campamento::all();
        $campas = $campamentos;
        foreach ($campas as $campa) {
            $fechaInicio = Carbon::parse($campa['fechaInicio']);
            $campa->fechaInicio = $fechaInicio->format('d/m/Y');

            $fechaFinal = Carbon::parse($campa['fechaFinal']);
            $campa->fechaFinal = $fechaFinal->format('d/m/Y');
        }
        return $campamentos->toJson();
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
     * @return \Illuminate\Http\Response json
     */
    public function store(CampamentoRequest $request)
    {
        $campamento = new Campamento($request->all());
        $campamento->save();

        if(isset($request->actual)){
            if($request->actual){
                $campamentos = Campamento::all();
                foreach ($campamentos as $campa) {
                    if($campa->id == $campamento->id){
                        $campa->actual = true;
                        $campa->save();
                    }else{
                        $campa->actual = false;
                        $campa->save();
                    }
                }
            }
        }
        flash($campamento->nombre.' creado exitosamente','success');
        return redirect('/webadmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campamento = Campamento::find($id);
        return view('campamento/editCampamento')->with('campamento', $campamento);
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
        $campamento = Campamento::find($id);
        $campamento->nombre = $request->nombre;
        $campamento->fechaInicio = $request->fechaInicio;
        $campamento->fechaFinal = $request->fechaFinal;

        if(isset($request->actual)){
            if($request->actual){
                $campamentos = Campamento::all();
                foreach ($campamentos as $campa) {
                    if($campa->id == $campamento->id){
                        $campa->actual = true;
                        $campa->save();
                    }else{
                        $campa->actual = false;
                        $campa->save();
                    }
                }
            }
        }

        $campamento->save();
        flash($campamento->nombre.' modificado exitosamente','success');
        return redirect('/webadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campamento = Campamento::find($id);
        $campamento->delete();
        if($campamento->delete()){
            flash($campamento->nombre.' eliminado exitosamente','success');
            return redirect('/webadmin');
        }else{
            flash($campamento->nombre.' error al eliminar','success');
            return redirect('/webadmin');
        }
    }
}
