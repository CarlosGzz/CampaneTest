<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Puesto;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = Puesto::all();
        return $puestos->toJson();
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
        $puesto = new Puesto($request->all());
        $puesto->save();

        flash($puesto->puesto.' creado exitosamente','success');
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
        $puesto = Puesto::find($id);
        return view('campamento/editPuesto')->with('puesto', $puesto);
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
        $puesto = Puesto::find($id);
        $puesto->puesto = $request->puesto;

        $puesto->save();
        flash($puesto->puesto.' modificado exitosamente','success');
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
        $puesto = Puesto::find($id);
        $puesto->delete();
        if($puesto->delete()){
            flash($puesto->puesto.' eliminado exitosamente','success');
            return redirect('/webadmin');
        }else{
            flash($puesto->puesto.' error al eliminar','success');
            return redirect('/webadmin');
        }
    }
}
