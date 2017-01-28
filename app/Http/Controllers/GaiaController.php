<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gaia;

class GaiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaias = Gaia::all();
        return $gaias->toJson();
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
        $gaia = new Gaia($request->all());
        $gaia->save();

        flash($gaia->gaia.' creado exitosamente','success');
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
        $gaia = Gaia::find($id);
        return view('campamento/editGaia')->with('gaia', $gaia);
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
        $gaia = Gaia::find($id);
        $gaia->gaia = $request->gaia;

        $gaia->save();
        flash($gaia->gaia.' modificado exitosamente','success');
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
        $gaia = Gaia::find($id);
        $gaia->delete();
        if($gaia->delete()){
            flash($gaia->gaia.' eliminado exitosamente','success');
            return redirect('/webadmin');
        }else{
            flash($gaia->gaia.' error al eliminar','success');
            return redirect('/webadmin');
        }
    }
}
