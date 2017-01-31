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
        $this->campamentoId = CampamentoTrait::campamentoActual();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        return $staff->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexActual()
    {
        //$staff = Staff::with('campamento');
        $staff = DB::table('staff')
            ->join('campamento_staff', 'staff.id', '=', 'campamento_staff.staff_id')
            ->where('campamento_staff.campamento_id',$this->campamentoId)
            ->get();
        return $staff->toJson();
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
        return view('public/encuestaStaffViejo')->with('staff', $staff);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit2($id)
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, $id)
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
     * Staff pagados en Campamento Corriente
     *
     * @param  void
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        if($request->pass == 'campane17'){
            return view('public/staffDashboard');
        }else{
            return view('public/staffHome');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffPagadosContador()
    {
        $staff = Staff::all();
        $staffCampaPagados = 0;
        foreach ($staff as $staf) {
            if($staf->campamento){
                foreach ($staf->campamento as $campa) {
                    if($campa->id == $this->campamentoId){
                        if(!empty($staf->pagado)){
                            $staffCampaPagados++;
                        }
                    }
                }
            }
        }
        return $staffCampaPagados;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffAsistentesContador()
    {
        $staff = Staff::all();
        $staffCampa = 0;
        foreach ($staff as $staf) {
            if($staf->campamento){
                foreach ($staf->campamento as $campa) {
                    if($campa->id == $this->campamentoId){
                        $staffCampa++;
                    }
                }
            }
        }
        return $staffCampa;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffRegistradosContador()
    {
        $staff = Staff::all()->count();
        return $staff;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffViejosNuevosContador()
    {
        $staff = Staff::all();
        $viejosNuevos['viejos'] = 0;
        $viejosNuevos['nuevos'] = 0;
        foreach ($staff as $staf) {
            if($staf->pulsera == 'roja'){
                $viejosNuevos['viejos']++;
            }
            if($staf->pulsera == 'plateada'){
                $viejosNuevos['viejos']++;
            }
        }
        $viejosNuevos['nuevos'] = $staff->count() - $viejosNuevos['viejos'];
        return $viejosNuevos;
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
                        $staffArray['nombre'] = $staf->nombre;
                        $staffArray['apellido'] = $staf->apellidoPaterno." ".$staf->apellidoMaterno;
                        $staffArray['gaia'] = $staf->gaia->gaia;
                        if(!empty($campa->puesto)){
                            $staffArray['puesto'] = $campa->puesto->puesto;
                        }else{
                            $staffArray['puesto'] = 'No Asignado';
                        }
                        $staffArray['pagado'] = $campa->pagado;
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
    public function dropdown()
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
