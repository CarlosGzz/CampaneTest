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
    public function distribucionDeGaiasDeVivientes()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->where('pagado','>','0')->get();
        $gaias = array();
        $gaias['draco'] = 0;
        $gaias['fenix'] = 0;
        $gaias['lycan'] = 0;
        $gaias['quimera'] = 0;
        $gaias['unicornio'] = 0;
        $gaias['sinGaia'] = 0;
        foreach ($vivientes as $viviente) {
            if($viviente->gaia){
                if($viviente->gaia->gaia == 'Draco'){
                    $gaias['draco']++;
                }
                if($viviente->gaia->gaia == 'Fénix'){
                    $gaias['fenix']++;
                }
                if($viviente->gaia->gaia == 'Lycan'){
                    $gaias['lycan']++;
                }
                if($viviente->gaia->gaia == 'Quimera'){
                    $gaias['quimera']++;
                }
                if($viviente->gaia->gaia == 'Unicornio'){
                    $gaias['unicornio']++;
                }
            }else{
                $gaias['sinGaia']++;
            }
        }
        return json_encode($gaias); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edadesChartDataPagados()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->where('pagado','>','0')->get();
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
    public function generoChartDataPagados()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->where('pagado','>','0')->get();
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vegetarianosVeganosChart()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->where('pagado','>','0')->get();
        $vegetarianosVeganosArray = array();
        $vegetarianosVeganosArray['vegetarianos'] = 0;
        $vegetarianosVeganosArray['veganos'] = 0;
        foreach ($vivientes as $viviente) {
            if($viviente->restriccionesAlimentarias == 'Vegetariano'){
                $vegetarianosVeganosArray['vegetarianos']++;
            }
            if($viviente->restriccionesAlimentarias == 'Vegano'){
                $vegetarianosVeganosArray['veganos']++;
            }
        }
        return json_encode($vegetarianosVeganosArray);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function encuestasDeVivientes()
    {
        $vivientes = Viviente::where('campamento_id',$this->campamentoId)->where('pagado','>','0')->get();
        $encuestasArray = array();
        $encuestaArray = array();
        $cualidades = array();
        $tableString = '';
        foreach ($vivientes as $viviente) {
            $quimera = 0.0;
            $lycan = 0.0;
            $draco = 0.0;
            $fenix = 0.0;
            $unicorino = 0.0;
            $encuestaArray['viviente'] = $viviente->nombre.' '.$viviente->apellidoPaterno.' '.$viviente->apellidoMaterno;

            $cualidades[0] = $viviente->encuesta->reservado;
            $cualidades[1] = $viviente->encuesta->prudencia;
            $cualidades[2] = $viviente->encuesta->handy;
            $cualidades[3] = $viviente->encuesta->misterioso;
            $cualidades[4] = $viviente->encuesta->franco;
            $cualidades[5] = $viviente->encuesta->sabiduria;
            $cualidades[6] = $viviente->encuesta->disciplina;
            $cualidades[7] = $viviente->encuesta->teson;
            $cualidades[8] = $viviente->encuesta->fortaleza;
            $cualidades[9] = $viviente->encuesta->sobreprotector;
            $cualidades[10] = $viviente->encuesta->idealista;
            $cualidades[11] = $viviente->encuesta->pasion;
            $cualidades[12] = $viviente->encuesta->elocuente;
            $cualidades[13] = $viviente->encuesta->improvisar;
            $cualidades[14] = $viviente->encuesta->creativo;
            $cualidades[15] = $viviente->encuesta->explosivo;
            $cualidades[16] = $viviente->encuesta->hipersensibilidad;
            $cualidades[17] = $viviente->encuesta->aventado;
            $cualidades[18] = $viviente->encuesta->afable;
            $cualidades[19] = $viviente->encuesta->movido;
            $cualidades[20] = $viviente->encuesta->optimismo;
            $cualidades[21] = $viviente->encuesta->generosidad;
            $cualidades[22] = $viviente->encuesta->empatia;
            $cualidades[23] = $viviente->encuesta->lealtad;
            $cualidades[24] = $viviente->encuesta->triunfar;
            for($i = 0; $i<25; $i++){
                switch ($cualidades[$i]) {
                    case 1:
                        $cualidades[$i]=5;
                        break;
                    case 2:
                        $cualidades[$i]=4;
                        break;
                    case 3:
                        $cualidades[$i]=3;
                        break;
                    case 4:
                        $cualidades[$i]=2;
                        break;
                    case 5:
                        $cualidades[$i]=1;
                        break;
                    default:
                        break;
                }
            }
            // Ecuaciones para sacar el porcentaje de Quimera
            $suma=0;
            for($i = 0; $i<5; $i++){
                $suma += $cualidades[$i];
            }
            $quimera = $suma*0.6666666667;

            // Ecuaciones para sacar el porcentaje de Lycan
            $suma=0;
            for($i = 5; $i<10; $i++){
                $suma += $cualidades[$i];
            }
            $lycan = $suma*0.6666666667;

            // Ecuaciones para sacar el porcentaje de Draco
            $suma=0;
            for($i = 10; $i<15; $i++){
                $suma += $cualidades[$i];
            }
            $draco = $suma*0.6666666667;

            // Ecuaciones para sacar el porcentaje de Fenix
            $suma=0;
            for($i = 15; $i<20; $i++){
                $suma += $cualidades[$i];
            }
            $fenix = $suma*0.6666666667;

            // Ecuaciones para sacar el porcentaje de Unicornio
            $suma=0;
            for($i = 20; $i<24; $i++){
                $suma += $cualidades[$i];
            }
            $unicorino = $suma*0.6666666667;

            $encuestaArray['quimera'] = sprintf("%.2f%%",$quimera);
            $encuestaArray['lycan'] = sprintf("%.2f%%",$lycan);
            $encuestaArray['draco'] = sprintf("%.2f%%",$draco);
            $encuestaArray['fenix'] = sprintf("%.2f%%",$fenix);
            $encuestaArray['unicornio'] = sprintf("%.2f%%",$unicorino);
            $encuestaArray['personalidad'] = $viviente->encuesta->personalidad;
            $encuestaArray['mismo'] = $viviente->encuesta->mismo;
            $encuestaArray['cualidades'] = $viviente->encuesta->cualidades;
            $encuestaArray['defectos'] = $viviente->encuesta->defectos;
            $encuestaArray['fiesta'] = $viviente->encuesta->fiesta;

            
            $tableString ="<table class='table table-striped table-bordered'>";
            $tableString.="<thead>";
            $tableString.="<tr>";
            $tableString.="<th>Cualidad</th>";
            $tableString.="<th>Puntaje</th>";
            $tableString.="</tr>";
            $tableString.="</thead>";
            $tableString.="<tbody>";
            $tableString.="<tr><td>Reservado</td><td style='text-align:center'>".$viviente->encuesta->reservado."</td><tr>";
            $tableString.="<tr><td>Sabiduria</td><td style='text-align:center'>".$viviente->encuesta->sabiduria."</td><tr>";
            $tableString.="<tr><td>Idealista</td><td style='text-align:center'>".$viviente->encuesta->idealista."</td><tr>";
            $tableString.="<tr><td>Explosivo</td><td style='text-align:center'>".$viviente->encuesta->explosivo."</td><tr>";
            $tableString.="<tr><td>Optimismo</td><td style='text-align:center'>".$viviente->encuesta->optimismo."</td><tr>";
            $tableString.="</tbody>";
            $tableString.="</table>";
            $string = "<ul><li>Reservado -------".$viviente->encuesta->reservado."</li>";
            $string .= "<li>Sabiduria -------".$viviente->encuesta->sabiduria."</li>";
            $string .= "<li>Idealista -------".$viviente->encuesta->idealista."</li>";
            $string .= "<li>Explosivo -------".$viviente->encuesta->explosivo."</li>";
            $string .= "<li>Optimismo -------".$viviente->encuesta->optimismo."</li></ul>";
            $encuestaArray['cualidades1'] = $tableString;
           
            $tableString ="<table class='table table-striped table-bordered'>";
            $tableString.="<thead>";
            $tableString.="<tr>";
            $tableString.="<th>Cualidad</th>";
            $tableString.="<th>Puntaje</th>";
            $tableString.="</tr>";
            $tableString.="</thead>";
            $tableString.="<tbody>";
            $tableString.="<tr><td>Prudencia</td><td style='text-align:center'>".$viviente->encuesta->prudencia."</td><tr>";
            $tableString.="<tr><td>Disciplina</td><td style='text-align:center'>".$viviente->encuesta->disciplina."</td><tr>";
            $tableString.="<tr><td>Pasion</td><td style='text-align:center'>".$viviente->encuesta->pasion."</td><tr>";
            $tableString.="<tr><td>Hipersensibilidad</td><td style='text-align:center'>".$viviente->encuesta->hipersensibilidad."</td><tr>";
            $tableString.="<tr><td>Generosidad</td><td style='text-align:center'>".$viviente->encuesta->generosidad."</td><tr>";
            $tableString.="</tbody>";
            $tableString.="</table>";
            $encuestaArray['cualidades2'] = $tableString;

            
            $tableString ="<table class='table table-striped table-bordered'>";
            $tableString.="<thead>";
            $tableString.="<tr>";
            $tableString.="<th>Cualidad</th>";
            $tableString.="<th>Puntaje</th>";
            $tableString.="</tr>";
            $tableString.="</thead>";
            $tableString.="<tbody>";
            $tableString.="<tr><td>Handy</td><td style='text-align:center'>".$viviente->encuesta->handy."</td><tr>";
            $tableString.="<tr><td>Téson</td><td style='text-align:center'>".$viviente->encuesta->teson."</td><tr>";
            $tableString.="<tr><td>Elocuente</td><td style='text-align:center'>".$viviente->encuesta->elocuente."</td><tr>";
            $tableString.="<tr><td>Aventado</td><td style='text-align:center'>".$viviente->encuesta->aventado."</td><tr>";
            $tableString.="<tr><td>Empatia</td><td style='text-align:center'>".$viviente->encuesta->empatia."</td><tr>";
            $tableString.="</tbody>";
            $tableString.="</table>";
            $encuestaArray['cualidades3'] = $tableString;

           
            $tableString ="<table class='table table-striped table-bordered'>";
            $tableString.="<thead>";
            $tableString.="<tr>";
            $tableString.="<th>Cualidad</th>";
            $tableString.="<th>Puntaje</th>";
            $tableString.="</tr>";
            $tableString.="</thead>";
            $tableString.="<tbody>";
            $tableString.="<tr><td>Misterioso</td><td style='text-align:center'>".$viviente->encuesta->misterioso."</td><tr>";
            $tableString.="<tr><td>Fortaleza</td><td style='text-align:center'>".$viviente->encuesta->fortaleza."</td><tr>";
            $tableString.="<tr><td>Improvisar</td><td style='text-align:center'>".$viviente->encuesta->improvisar."</td><tr>";
            $tableString.="<tr><td>Afable</td><td style='text-align:center'>".$viviente->encuesta->afable."</td><tr>";
            $tableString.="<tr><td>Lealtad</td><td style='text-align:center'>".$viviente->encuesta->lealtad."</td><tr>";
            $tableString.="</tbody>";
            $tableString.="</table>";
            $encuestaArray['cualidades4'] = $tableString;

            
            $tableString ="<table class='table table-striped table-bordered'>";
            $tableString.="<thead>";
            $tableString.="<tr>";
            $tableString.="<th>Cualidad</th>";
            $tableString.="<th>Puntaje</th>";
            $tableString.="</tr>";
            $tableString.="</thead>";
            $tableString.="<tbody>";
            $tableString.="<tr><td>Franco</td><td style='text-align:center'>".$viviente->encuesta->franco."</td><tr>";
            $tableString.="<tr><td>Sobreprotector</td><td style='text-align:center'>".$viviente->encuesta->sobreprotector."</td><tr>";
            $tableString.="<tr><td>Creativo</td><td style='text-align:center'>".$viviente->encuesta->creativo."</td><tr>";
            $tableString.="<tr><td>Movido</td><td style='text-align:center'>".$viviente->encuesta->movido."</td><tr>";
            $tableString.="<tr><td>Triunfar</td><td style='text-align:center'>".$viviente->encuesta->triunfar."</td><tr>";
            $tableString.="</tbody>";
            $tableString.="</table>";
            $encuestaArray['cualidades5'] = $tableString;
            array_push($encuestasArray, $encuestaArray);
        }
        return json_encode($encuestasArray);
    }


}