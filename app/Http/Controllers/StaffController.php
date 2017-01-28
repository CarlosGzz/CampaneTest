<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Staff;

use App\Campamento;

use App\Http\Traits\CampamentoTrait;

use DB;


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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Staff pagados en Campamento Corriente
     *
     * @param  void
     * @return \Illuminate\Http\Response
     */
    public function staffPagados($id)
    {
        $staff;
    }

    // FUNCIONES A HACER 
    /* staff pagados
            <?php 
                $data = $db->query("SELECT COUNT(s.idStaff) as totalStaffPagados FROM staff as s INNER JOIN staffCampamento as c ON s.idStaff = c.idStaff WHERE c.pagado>0");
                $totalStaffPagados=mysqli_fetch_assoc($data);
                echo $totalStaffPagados['totalStaffPagados'];
            ?> 
       staff asistentes a campamento
       staff registrados totales
    */ 
}
