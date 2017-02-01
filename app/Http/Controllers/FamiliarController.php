<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Familiar;
use App\Http\Traits\CampamentoTrait;

class FamiliarController extends Controller
{
    private $campamentoId;
    /**
     * Create a new controller instance and validation of user auth.
     *
     * @return void
     */
    public function __construct()
    {
        $this->campamentoId = CampamentoTrait::campamentoActual();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familiares = Familiar::all();
        $familiaresArray = array();
        $familiarArray = array();
        foreach ($familiares as $familiar) {
            if($familiar->viviente->campamento->id == $this->campamentoId ){
                $familiarArray['id'] = $familiar->id;
                $familiarArray['viviente'] = $familiar->viviente->nombre.' '.$familiar->viviente->apellidoPaterno.' '.$familiar->viviente->apellidoMaterno;
                $familiarArray['nombre'] = $familiar->nombre;
                $familiarArray['tipoFamiliar'] = $familiar->tipoFamiliar;
                $familiarArray['telefono'] = $familiar->telefono;
                $familiarArray['celular'] = $familiar->celular;
                $familiarArray['correo'] = $familiar->correo;
                $familiarArray['esViviente'] = $familiar->esViviente;
                array_push($familiaresArray, $familiarArray);
            }
        }
        return json_encode($familiaresArray); 
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
        //
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
        $familiar = Familiar::find($id);
        return view('familiares/editFamiliar')->with('familiar', $familiar);
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
        $familiar = Familiar::find($id);
        $familiar->nombre = $request->nombre;
        $familiar->telefono = $request->telefono;
        $familiar->celular = $request->celular;
        $familiar->correo = $request->correo;
        $familiar->tipoFamiliar = $request->tipoFamiliar;
        $familiar->esViviente = $request->esViviente;
        $familiar->save();
        flash($familiar->nombre.' modificado exitosamente','success');
        return redirect('vivientes/familiares');

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
