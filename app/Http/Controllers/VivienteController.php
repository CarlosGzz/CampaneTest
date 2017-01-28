<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Viviente;
use App\Encuesta;
use App\Familiar;

use App\Http\Traits\CampamentoTrait;

class VivienteController extends Controller
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
        $vivientes = Viviente::all();

        return $vivientes->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vivientesEnCampamento()
    {
        $vivientes = Viviente::all();

        return $vivientes->toJson();
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
        $error = 0;

        $viviente = new Viviente();
        $viviente->nombre = $request->nombre;
        $viviente->apellidoPaterno = $request->apellidoPaterno;
        $viviente->apellidoMaterno = $request->apellidoMaterno;
        $viviente->genero = $request->genero;
        $viviente->fechaNacimiento = $request->fechaNacimiento;
        $viviente->telefonoCel = $request->celular;
        $viviente->telefonoCasa = $request->telefonoCasa;
        $viviente->correo = $request->correo;
        $viviente->restriccionesAlimentarias = $request->restriccionesAlimentarias;
        $viviente->alergias = $request->alergias;
        $viviente->medioCampamento = $request->medioCampamento;
        if(!empty($request->staff)){
            $viviente->staff_id = $request->staff;
        }
        if(!empty($request->otroStaff)){
            $viviente->otroStaff = $request->otroStaff;
        }
        $viviente->campamento_id = $this->campamentoId;
        $saved = $viviente->save();
        if(!$saved){
            $error++;
        }

        $encuesta = new Encuesta();
        $encuesta->viviente_id = $viviente->id;
        $encuesta->reservado = $request->reservado;
        $encuesta->sabiduria = $request->sabiduria;
        $encuesta->idealista = $request->idealista;
        $encuesta->explosivo = $request->explosivo;
        $encuesta->optimismo = $request->optimismo;

        $encuesta->prudencia = $request->prudencia;
        $encuesta->disciplina = $request->disciplina;
        $encuesta->pasion = $request->pasion;
        $encuesta->hipersensibilidad = $request->hipersensibilidad;
        $encuesta->generosidad = $request->generosidad;

        $encuesta->handy = $request->handy;
        $encuesta->teson = $request->teson;
        $encuesta->elocuente = $request->elocuente;
        $encuesta->aventado = $request->aventado;
        $encuesta->empatia = $request->empatia;

        $encuesta->misterioso = $request->misterioso;
        $encuesta->fortaleza = $request->fortaleza;
        $encuesta->improvisar = $request->improvisar;
        $encuesta->afable = $request->afable;
        $encuesta->lealtad = $request->lealtad;

        $encuesta->franco = $request->franco;
        $encuesta->sobreprotector = $request->sobreprotector;
        $encuesta->creativo = $request->creativo;
        $encuesta->movido = $request->movido;
        $encuesta->triunfar = $request->triunfar;

        $encuesta->personalidad = $request->personalidad;
        $encuesta->mismo = $request->mismo;
        $encuesta->cualidades = $request->cualidades;
        $encuesta->defectos = $request->defectos;
        $encuesta->fiesta = $request->fiesta;
        $saved = $encuesta->save();
        if(!$saved){
            $error++;
        }

        $padre = new Familiar();
        $madre = new Familiar();
        $amigo1 = new Familiar();
        $amigo2 = new Familiar();
        $amigo3 = new Familiar();

        $padre->viviente_id = $viviente->id;
        $padre->tipoFamiliar = 'Padre';
        $padre->nombre = $request->nombrePadre;
        $padre->celular = $request->celularPadre;
        $padre->telefono = $request->telefonoPadre;
        $padre->correo = $request->correoPadre;

        $madre->viviente_id = $viviente->id;
        $madre->tipoFamiliar = 'Madre';
        $madre->nombre = $request->nombreMadre;
        $madre->celular = $request->celularMadre;
        $madre->telefono = $request->telefonoMadre;
        $madre->correo = $request->correoMadre;

        $amigo1->viviente_id = $viviente->id;
        $amigo1->tipoFamiliar = 'Amigo1';
        $amigo1->nombre = $request->nombreAmigo1;
        $amigo1->celular = $request->celularAmigo1;
        $amigo1->telefono = $request->telefonoAmigo1;
        $amigo1->correo = $request->correoAmigo1;

        $amigo2->viviente_id = $viviente->id;
        $amigo2->tipoFamiliar = 'Amigo2';
        $amigo2->nombre = $request->nombreAmigo2;
        $amigo2->celular = $request->celularAmigo2;
        $amigo2->telefono = $request->telefonoAmigo2;
        $amigo2->correo = $request->correoAmigo2;

        $amigo3->viviente_id = $viviente->id;
        $amigo3->tipoFamiliar = 'Amigo3';
        $amigo3->nombre = $request->nombreAmigo3;
        $amigo3->celular = $request->celularAmigo3;
        $amigo3->telefono = $request->telefonoAmigo3;
        $amigo3->correo = $request->correoAmigo3;

        $saved = $padre->save();
        if(!$saved){
            $error++;
        }
        $saved = $madre->save();
        if(!$saved){
            $error++;
        }
        $saved = $amigo1->save();
        if(!$saved){
            $error++;
        }
        $saved = $amigo2->save();
        if(!$saved){
            $error++;
        }
        $saved = $amigo3->save();
        if(!$saved){
            $error++;
        }

        if($error>0){
            return 2;
        }
        return 1;

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
