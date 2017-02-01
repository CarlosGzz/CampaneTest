<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Staff;

use App\Viviente;

use App\Campamento;

use App\Http\Traits\CampamentoTrait;

use Carbon\Carbon;


class StaffDashboardController extends Controller
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
    public function vivientesRegistradosContador()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->count();
        return $vivientes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vivientesPagadosContador()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->where('pagado',850)->count();
        return $vivientes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vivientesPagadosParcialesContador()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->whereBetween('pagado', [1, 849])->count();
        return $vivientes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edadesChartData()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->get();
        $edadesArray = array();
        $edadesArray['sinEdad']=0;
        $edadesArray['intervalo1']=0;
        $edadesArray['intervalo2']=0;
        $edadesArray['intervalo3']=0;
        $edadesArray['intervalo4']=0;
        $edadesArray['intervalo5']=0;
        $edadesArray['mayores']=0;

        foreach ($vivientes as $viviente) {
            $edad = Carbon::parse($viviente->fechaNacimiento);
            if($edad->age < 18){
                if($edad->age==0){
                    $edadesArray['sinEdad']++;
                }else{
                    $edadesArray['intervalo1']++;
                }

            }
            if($edad->age == 18 || $edad->age == 19){
                $edadesArray['intervalo2']++;
            }
            if($edad->age == 20 || $edad->age == 21){
                $edadesArray['intervalo3']++;
            }
            if($edad->age == 22 || $edad->age == 23){
                $edadesArray['intervalo4']++;
            }
            if($edad->age == 24 || $edad->age == 25){
                $edadesArray['intervalo5']++;
            }
            if($edad->age > 25){
                $edadesArray['mayores']++;
            }
        }
        return json_encode($edadesArray);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generoChartData()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->get();
        $generoArray = array();
        $generoArray['hombres'] = 0;
        $generoArray['mujeres'] = 0;
        foreach ($vivientes as $viviente) {
            if($viviente->genero == 'M'){
                $generoArray['hombres']++;
            }
            if($viviente->genero == 'F'){
                $generoArray['mujeres']++;
            }
        }
        return json_encode($generoArray);
    }

}