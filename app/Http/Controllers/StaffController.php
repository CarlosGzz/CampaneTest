<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Staff;

use App\Viviente;

use App\Campamento;

use App\Http\Traits\CampamentoTrait;

use DB;

use Carbon\Carbon;


class StaffController extends Controller
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
        return view('staff.staffDashboard');
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
        $staff = Staff::find($id);
        return view('staff/editStaff')->with('staff', $staff);
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
        //dd($request);
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
        if(isset($request->activo)){
            $staff->activo = $request->activo;
        }else{
            $staff->activo = 0;
        }
        $staff->save();
        foreach ($staff->campamento as $campa) {
            if($campa->id == $this->campamentoId){
                return redirect('/staff/miembros');
            }
        }
        if($request->asistente == true){
            $staff->activo = true;
            $staff->campamento()->attach($this->campamentoId);
        }else{
            $staff->activo = false;
        }
        return redirect('/stafers/miembros');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        if($staff->delete()){
            flash($staff->nombre.' eliminado exitosamente','success');
            return redirect('/stafers/miembros');
        }else{
            flash($staff->nombre.' error al eliminar','success');
            return redirect('/stafers/miembros');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffRegistrados()
    {
        $staff = Staff::all();
        //dd($vivientes);
        $staffsArray = array();
        $staffArray = array();
        foreach ($staff as $staf) {
            $staffArray['id'] = $staf->id;
            $staffArray['nombre'] = $staf->nombre;
            $staffArray['apellido'] = $staf->apellidoPaterno." ".$staf->apellidoMaterno;
            $staffArray['genero'] = $staf->genero;
            $edad = Carbon::parse($staf->fechaNacimiento);
            $staffArray['edad'] = $edad->age;
            $staffArray['correo'] = $staf->correo;
            $staffArray['celular'] = $staf->telefonoCel;
            $staffArray['gaia'] = $staf->gaia->gaia;
            $staffArray['rolDeseado'] = $staf->rolDeseado;
            $staffArray['pulsera'] = $staf->pulsera;
            $staffArray['carrera'] = $staf->carrera;
            $staffArray['universidad'] = $staf->universidad;
            $staffArray['estudianteGraduado'] = $staf->estudianteGraduado;
            $staffArray['activo'] = $staf->activo;
            array_push($staffsArray, $staffArray);
        }
        return json_encode($staffsArray); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffPagados()
    {
        $staff = Staff::all();
        //dd($vivientes);
        $staffsArray = array();
        $staffArray = array();
        foreach ($staff as $staf) {
            if($staf->campamento){
                foreach ($staf->campamento as $campa) {
                    if($campa->id == $this->campamentoId){
                        if(!empty($staf->pagado)){
                            $staffArray['id'] = $staf->id;
                            $staffArray['nombre'] = $staf->nombre;
                            $staffArray['apellido'] = $staf->apellidoPaterno." ".$staf->apellidoMaterno;
                            $staffArray['genero'] = $staf->genero;
                            $edad = Carbon::parse($staf->fechaNacimiento);
                            $staffArray['edad'] = $edad->age;
                            $staffArray['correo'] = $staf->correo;
                            $staffArray['celular'] = $staf->telefonoCel;
                            $staffArray['gaia'] = $staf->gaia->gaia;
                            $staffArray['rolDeseado'] = $staf->rolDeseado;
                            $staffArray['pulsera'] = $staf->pulsera;
                            $staffArray['carrera'] = $staf->carrera;
                            $staffArray['universidad'] = $staf->universidad;
                            $staffArray['estudianteGraduado'] = $staf->estudianteGraduado;
                            array_push($staffsArray, $staffArray);
                        }
                    }
                }
            }
        }
        return json_encode($staffsArray);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffAsistentes()
    {
        $staff = Staff::all();
        $vivientes = Viviente::all();
        //dd($vivientes);
        $staffsArray = array();
        $staffArray = array();
        foreach ($staff as $staf) {
            if($staf->campamento){
                foreach ($staf->campamento as $campa) {
                    if($campa->id == $this->campamentoId){
                        //dd($campa);
                        $staffArray['nombre'] = $staf->nombre;
                        $staffArray['apellido'] = $staf->apellidoPaterno." ".$staf->apellidoMaterno;
                        $staffArray['gaia'] = $staf->gaia->gaia;
                        if(!empty($campa->puesto)){
                            $staffArray['puesto'] = $campa->puesto->puesto;
                        }else{
                            $staffArray['puesto'] = 'No Asignado';
                        }
                        $staffArray['pagado'] = $campa->pivot->pagado;
                        if(!empty($campa->vehiculo)){
                            $staffArray['vehiculo'] = $campa->vehiculo;
                        }else{
                            $staffArray['vehiculo'] = 'No';
                        }
                        $staffArray['correo'] = $staf->correo;
                        $staffArray['telefonoCel'] = $staf->telefonoCel;
                        $staffArray['vivientes'] = $staf->vivientes->count();
                        $staffArray['aPagar'] = '350';
                        $staffArray['id'] = $staf->id;
                        array_push($staffsArray, $staffArray);
                    }
                }
            }
        }
        return json_encode($staffsArray);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function distribucionDeGaiasDeStaff()
    {
        $staff = Staff::all();
        $gaias = array();
        $gaias['draco'] = 0;
        $gaias['fenix'] = 0;
        $gaias['lycan'] = 0;
        $gaias['quimera'] = 0;
        $gaias['unicornio'] = 0;
        foreach ($staff as $staf) {
            if($staf->gaia){
                if($staf->gaia->gaia == 'Draco'){
                    $gaias['draco']++;
                }
                if($staf->gaia->gaia == 'Fénix'){
                    $gaias['fenix']++;
                }
                if($staf->gaia->gaia == 'Lycan'){
                    $gaias['lycan']++;
                }
                if($staf->gaia->gaia == 'Quimera'){
                    $gaias['quimera']++;
                }
                if($staf->gaia->gaia == 'Unicornio'){
                    $gaias['unicornio']++;
                }
            }
        }
        return json_encode($gaias); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function distribucionDeGaiasDeStaffRegistradosACampamento()
    {
        $staff = Staff::all();
        $gaias = array();
        $gaias['draco'] = 0;
        $gaias['fenix'] = 0;
        $gaias['lycan'] = 0;
        $gaias['quimera'] = 0;
        $gaias['unicornio'] = 0;
        foreach ($staff as $staf) {
            if($staf->campamento){
                foreach ($staf->campamento as $campa) {
                    if($campa->id == $this->campamentoId){
                        if($staf->gaia){
                            if($staf->gaia->gaia == 'Draco'){
                                $gaias['draco']++;
                            }
                            if($staf->gaia->gaia == 'Fénix'){
                                $gaias['fenix']++;
                            }
                            if($staf->gaia->gaia == 'Lycan'){
                                $gaias['lycan']++;
                            }
                            if($staf->gaia->gaia == 'Quimera'){
                                $gaias['quimera']++;
                            }
                            if($staf->gaia->gaia == 'Unicornio'){
                                $gaias['unicornio']++;
                            }
                        }
                    }
                }
            }
        }
        return json_encode($gaias); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffTiles()
    {
        $staff = Staff::all();
        $satffTiles = array();
        $satffTiles['total'] = Staff::all()->count();
        $satffTiles['activo'] = 0;
        $satffTiles['inactivo'] = 0;
        $satffTiles['registrados'] = 0;
        foreach ($staff as $staf) {

            if($staf->activo == '1'){
                $satffTiles['activo']++;
            }else{
                $satffTiles['inactivo']++;
            }
            foreach ($staf->campamento as $campa) {
                if($campa->id == $this->campamentoId){
                    $satffTiles['registrados']++;
                }
            }
        }
        return json_encode($satffTiles); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffDropdownCampamentoActual()
    {
        $staff = Staff::all();
        //dd($vivientes);
        $staffsArray = array();
        $staffArray = array();
        foreach ($staff as $staf) {
            if($staf->campamento){
                foreach ($staf->campamento as $campa) {
                    if($campa->id == $this->campamentoId){
                        $staffArray['id'] = $staf->id;
                        $staffArray['nombre'] = $staf->nombre." ".$staf->apellidoPaterno." ".$staf->apellidoMaterno;
                        array_push($staffsArray, $staffArray);
                    }
                }
            }
        }
        
        return json_encode($staffsArray);
    }
}
