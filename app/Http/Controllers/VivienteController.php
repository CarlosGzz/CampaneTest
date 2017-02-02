<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Viviente;
use App\Encuesta;
use App\Familiar;

use App\Http\Traits\CampamentoTrait;
use Carbon\Carbon;

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

        return view('vivientes.vivientesDashboard');

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
        $viviente = Viviente::find($id);
        return view('vivientes/editViviente')->with('viviente', $viviente);
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
        $viviente = Viviente::find($id);
        if(isset($request->nombre))
            $viviente->nombre = $request->nombre;

        if(isset($request->apellidoPaterno))
            $viviente->apellidoPaterno = $request->apellidoPaterno;

        if(isset($request->apellidoMaterno))
            $viviente->apellidoMaterno = $request->apellidoMaterno;

        if(isset($request->fechaNacimiento))
            $viviente->fechaNacimiento = $request->fechaNacimiento;

        if(isset($request->celular))
            $viviente->telefonoCel = $request->celular;

        if(isset($request->telefonoCasa))
            $viviente->telefonoCasa = $request->telefonoCasa;

        if(isset($request->correo))
            $viviente->correo = $request->correo;

        if(isset($request->medioCampamento)){
            $viviente->medioCampamento = $request->medioCampamento;

            if($request->medioCampamento == 'Miembro de Staff'){
                if($request->staff == 'Otro'){
                    $viviente->otro = $request->otroStaff;
                }else{
                    $viviente->staff_id = $request->staff;
                }
            }else{
                $viviente->staff_id = null;
                $viviente->otro = null;
            }
        }
        if(isset($request->observaciones))
            $viviente->observaciones = $request->observaciones;

        $saved = $viviente->save();
        if($viviente->save()){
            flash($viviente->nombre.' modificado exitosamente','success');
            return redirect('/vivientes');
        }else{
            flash($viviente->nombre.' modificado exitosamente','success');
            return redirect('/vivientes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viviente = Viviente::find($id);
        if($viviente->delete()){
            flash($viviente->nombre.' eliminado exitosamente','success');
            return redirect('/vivientes');
        }else{
            flash($viviente->nombre.' error al eliminar','success');
            return redirect('/vivientes');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vivientesEnCampamentoRegistrados()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->where('pagado',null)->get();
        //dd($vivientes);
        $vivientesArray = array();
        $vivienteArray = array();
        foreach ($vivientes as $viviente) {
            $vivienteArray['id'] = $viviente->id;
            $vivienteArray['genero'] = $viviente->genero;
            $vivienteArray['nombre'] = $viviente->nombre;
            $vivienteArray['apellido'] = $viviente->apellidoPaterno." ".$viviente->apellidoMaterno;
            $edad = Carbon::parse($viviente->fechaNacimiento);
            $vivienteArray['edad'] = $edad->age;
            $vivienteArray['telefono'] = $viviente->telefonoCasa;
            $vivienteArray['celular'] = $viviente->telefonoCel;
            $vivienteArray['correo'] = $viviente->correo;
            $vivienteArray['observaciones'] = $viviente->observaciones;
            $vivienteArray['medio'] = $viviente->medioCampamento;
            if($vivienteArray['medio'] == 'Miembro de Staff'){
                if(!empty($viviente->otro)){
                    $vivienteArray['staff'] = $viviente->otro;
                }else{
                    if($viviente->staff){
                        $vivienteArray['staff'] = $viviente->staff->nombre." ".$viviente->staff->apellidoPaterno;
                    }
                }
            }else{
                $vivienteArray['staff'] = '';
            }
            array_push($vivientesArray, $vivienteArray);
        }
        return json_encode($vivientesArray); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vivientesEnCampamentoPagadosParciales()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->whereBetween('pagado', [1, 849])->get();
        //dd($vivientes);
        $vivientesArray = array();
        $vivienteArray = array();
        foreach ($vivientes as $viviente) {
            $vivienteArray['id'] = $viviente->id;
            $vivienteArray['genero'] = $viviente->genero;
            $vivienteArray['nombre'] = $viviente->nombre;
            $vivienteArray['apellido'] = $viviente->apellidoPaterno." ".$viviente->apellidoMaterno;
            $edad = Carbon::parse($viviente->fechaNacimiento);
            $vivienteArray['edad'] = $edad->age;
            $vivienteArray['telefono'] = $viviente->telefonoCasa;
            $vivienteArray['celular'] = $viviente->telefonoCel;
            $vivienteArray['correo'] = $viviente->correo;
            if($viviente->gaia){
                $vivienteArray['gaia'] = $viviente->gaia->gaia;
            }else{
                $vivienteArray['gaia'] = 'no asignado';
            }
            $vivienteArray['pagado'] = $viviente->pagado;
            $vivienteArray['observaciones'] = $viviente->observaciones;
            $vivienteArray['restricciones'] = $viviente->restriccionesAlimentarias;
            $vivienteArray['alergias'] = $viviente->alergias;
            $vivienteArray['medio'] = $viviente->medioCampamento;
            if($vivienteArray['medio'] == 'Miembro de Staff'){
                if(!empty($viviente->otro)){
                    $vivienteArray['staff'] = $viviente->otro;
                }else{
                    $vivienteArray['staff'] = $viviente->staff->nombre." ".$viviente->staff->apellidoPaterno;
                }
            }else{
                $vivienteArray['staff'] = '';
            }
            array_push($vivientesArray, $vivienteArray);
        }
        return json_encode($vivientesArray); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vivientesEnCampamentoPagadosTotales()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->where('pagado', 850)->get();
        $vivientesArray = array();
        $vivienteArray = array();
        foreach ($vivientes as $viviente) {
            $vivienteArray['id'] = $viviente->id;
            $vivienteArray['genero'] = $viviente->genero;
            $vivienteArray['nombre'] = $viviente->nombre;
            $vivienteArray['apellido'] = $viviente->apellidoPaterno." ".$viviente->apellidoMaterno;
            $edad = Carbon::parse($viviente->fechaNacimiento);
            $vivienteArray['edad'] = $edad->age;
            $vivienteArray['telefono'] = $viviente->telefonoCasa;
            $vivienteArray['celular'] = $viviente->telefonoCel;
            $vivienteArray['correo'] = $viviente->correo;
            if($viviente->gaia){
                $vivienteArray['gaia'] = $viviente->gaia->gaia;
            }else{
                $vivienteArray['gaia'] = 'no asignado';
            }
            $vivienteArray['pagado'] = $viviente->pagado;
            $vivienteArray['observaciones'] = $viviente->observaciones;
            $vivienteArray['restricciones'] = $viviente->restriccionesAlimentarias;
            $vivienteArray['alergias'] = $viviente->alergias;
            $vivienteArray['medio'] = $viviente->medioCampamento;
            if(!empty($viviente->otro)){
                $vivienteArray['staff'] = $viviente->otro;
            }else{
                $vivienteArray['staff'] = $viviente->staff->nombre." ".$viviente->staff->apellidoPaterno;
            }
            array_push($vivientesArray, $vivienteArray);
        }
        return json_encode($vivientesArray); 
    }
}
