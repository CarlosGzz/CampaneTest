<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Staff;

use App\Viviente;

use App\Encuesta;

use App\Familiar;

use App\Campamento;

use App\Http\Traits\CampamentoTrait;

use Carbon\Carbon;


class EncuestaController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeViviente(Request $request)
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
        if($request->medioCampamento == 'Miembro de Staff'){
            if($request->staff == 'Otro'){
            $viviente->otro = $request->otroStaff;
            }else{
                $viviente->staff_id = $request->staff;
            }
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
     * Crear staff nuevo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStaff(Request $request)
    {
        $staff = new Staff($request->all());
        if($request->asistente == 1){
            $staff->activo = true;
            $staff->save();
            $staff->campamento()->attach($this->campamentoId);
        }else{
            $staff->activo = false;
            $staff->save();
        }
        return redirect('/graciasStaff');
    }

    /**
     * Autenticar con contraseña para que staff viejo pueda ver sus datos 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function encuestaStaffViejo(Request $request)
    {
        if($request->password == 'campane17'){
            return $this->editStaff($request->id);
        }else{
            return view('public/encuestaStaffViejoPassword')->with('staff',$request->id);
        }
    }

    /**
     * Mostrar forma de staff con datos de staff viejo
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editStaff($id)
    {
        $staff = Staff::find($id);
        return view('public/encuestaStaffViejo')->with('staff', $staff);
    }

    /**
     * Actualizar staff viejo
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStaff(Request $request, $id)
    {
        $staff = Staff::find($id);
        $staffUpdate = new Staff($request->all());
        $staff->nombre = $request->nombre;
        $staff->apellidoPaterno = $request->apellidoPaterno;
        $staff->apellidoMaterno = $request->apellidoMaterno;
        $staff->genero = $request->genero;
        $staff->fechaNacimiento = $request->fechaNacimiento;
        $staff->carrera = $request->carrera;
        $staff->universidad = $request->universidad;
        $staff->estudianteGraduado = $request->estudianteGraduado;
        $staff->gaia_id = $request->gaia_id;
        $staff->rolDeseado = $request->rolDeseado;
        $staff->pulsera = $request->pulsera;
        $staff->correo = $request->correo;
        $staff->telefonoCel = $request->telefonoCel;
        $staff->save();
        foreach ($staff->campamento as $campa) {
            echo $campa->nombre;
            if($campa->id == $this->campamentoId){
                return redirect('/graciasStaff');
            }
        }
        if($request->asistente == true){
            $staff->activo = true;
            $staff->campamento()->attach($this->campamentoId);
        }else{
            $staff->activo = false;
        }
        return redirect('/graciasStaff');
    }

    public function staffDropdown()
    {
        $staff = Staff::all();
        //dd($vivientes);
        $staffsArray = array();
        $staffArray = array();
        foreach ($staff as $staf) {
            $staffArray['id'] = $staf->id;
            $staffArray['nombre'] = $staf->nombre." ".$staf->apellidoPaterno." ".$staf->apellidoMaterno;
            array_push($staffsArray, $staffArray);
        }
        return json_encode($staffsArray);
    }

}