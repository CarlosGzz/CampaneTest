@extends('layouts.app')

@section('content')

<div class="">
                    <div class="row">
                        <div class="page-title">
                            <div class="title_left">
                                <h3> Vivientes <small></small></h3>
                            </div>
                        </div>
                    </div>
                    <!--Fast Insights Vivientes-->
                    <div class="row top_tiles" style="margin: 10px 0;">
                        <div class="row top_tiles">
                            <!--Viventes Pagados-->
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats" id="vivientesPagados">
                                    <div class="icon"><i class="fa fa-money"></i></div>
                                    <div class="count">
                                    <?php
                                        require "../../MODEL/connect.php";
                                        $data = $db->query("SELECT COUNT(idViviente) as totalPagados FROM viviente WHERE pagado>0");
                                        $totalPagados=mysqli_fetch_assoc($data);
                                        echo $totalPagados['totalPagados'];
                                    ?>
                                    </div>
                                    <h3>Pagados</h3>
                                    <p> </p>
                                </div>
                            </div>
                            <!--/Viventes Pagados-->
                            <!--Viventes Encuestados-->
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-file-text"></i></div>
                                    <div class="count">
                                    <?php
                                        $data = $db->query("SELECT COUNT(v.idViviente) as totalEncuestados FROM viviente as v INNER JOIN encuesta as e ON v.idViviente=e.idViviente");
                                        $totalEncuestados=mysqli_fetch_assoc($data);
                                        echo $totalEncuestados['totalEncuestados'];
                                    ?>
                                    </div>
                                    <h3>Ecuestados</h3>
                                    <p></p>
                                </div>
                            </div>
                            <!--/Viventes Encuestados-->
                            <!--Viventes Registrados-->
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="count">

                                    <?php
                                        $data = $db->query("SELECT COUNT(idViviente) as totalVivientes FROM viviente");
                                        $totalVivientes=mysqli_fetch_assoc($data);
                                        echo $totalVivientes['totalVivientes'];
                                    ?>

                                    </div>
                                    <h3>Registrados</h3>
                                    <p> </p>
                                </div>
                            </div>
                            <!--/Viventes Registrados-->
                            <!--Viventes Vacantes-->
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-group"></i></div>
                                    <div class="count">
                                    <?php
                                        echo 45-$totalPagados['totalPagados'];
                                    ?>
                                    </div>
                                    <h3>Vacantes</h3>
                                    <p></p>
                                </div>
                            </div>
                            <!--/Viventes Vacantes-->
                        </div>
                    </div>
                    <!--/Fast Insights Vivientes-->
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="page-title">
                                    <div class="title_left">
                                        <h3> Staff <small></small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fast Insights Staff-->
                        <div class="row top_tiles" style="margin: 10px 0;">
                            <div class="row top_tiles">
                                <!--Staff Pagados-->
                                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon2" ><i class="fa fa-money"></i></div>
                                        <div class="count" style="font-size: 20px;">
                                        <?php
                                            
                                            $data = $db->query("SELECT COUNT(s.idStaff) as totalStaffPagados FROM staff as s INNER JOIN staffCampamento as c ON s.idStaff = c.idStaff WHERE c.pagado>0");
                                            $totalStaffPagados=mysqli_fetch_assoc($data);
                                            echo $totalStaffPagados['totalStaffPagados'];
                                        ?>
                                        </div>
                                        <h3 style="font-size: 15px;">Pagados</h3>
                                        <p> </p>
                                    </div>
                                </div>
                                <!--/Staff Pagados-->
                                <!--Staff Asistentes-->
                                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon2"><i class="fa fa-file-text" style="font-size: 40px;"></i></div>
                                        <div class="count" style="font-size: 20px;">
                                        <?php
                                            $data = $db->query("SELECT COUNT(s.idStaff) as totalStaffAsistentes FROM staff as s INNER JOIN staffCampamento as c ON s.idStaff = c.idStaff ");
                                            $totalStaffAsistentes=mysqli_fetch_assoc($data);
                                            echo $totalStaffAsistentes['totalStaffAsistentes'];
                                        ?>
                                        </div>
                                        <h3 style="font-size: 15px;">Asistentes</h3>
                                        <p></p>
                                    </div>
                                </div>
                                <!--/Staff Asistentes-->
                                <!--Staff Registrados-->
                                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon2"><i class="fa fa-user"></i></div>

                                        <div class="count" style="font-size: 20px;">

                                            <?php
                                                $data = $db->query("SELECT COUNT(idStaff) as totalStaff FROM staff");
                                                $totalStaff=mysqli_fetch_assoc($data);
                                                echo $totalStaff['totalStaff'];
                                            ?>

                                        </div>
                                        <h3 style="font-size: 15px;">Total</h3>
                                        <p> </p>
                                    </div>
                                </div>
                                <!--/Staff Registrados-->
                                <!--Staff Viejos/Nuevos-->
                                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon3">
                                            <td>
                                                <canvas id="canvas3" height="50" width="50" style="margin: 0px 0px 0px 0px"></canvas>
                                            </td>
                                        </div>
                                        <div class="count" style="font-size: 20px;">
                                        <?php
                                            $data = $db->query("SELECT COUNT(idStaff) as viejosStaff FROM staff WHERE pulsera ='rojo' OR pulsera ='plateada'");
                                            $viejosStaff=mysqli_fetch_assoc($data);
                                            echo $viejosStaff['viejosStaff'];
                                            echo "/";
                                            echo $totalStaff['totalStaff']-$viejosStaff['viejosStaff'];
                                        ?>
                                        </div>
                                        <h3 style="font-size: 12px;">Viejos/Nuevos</h3>
                                        <p></p>
                                    </div>
                                </div>
                                <!--/Staff Viejos/Nuevos-->
                            </div>
                        </div>
                        <br />
                        <!--Punto de Equilibrio-->
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Bar Graph</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div id="mainb" style="height: 350px; -webkit-tap-highlight-color: transparent; -webkit-user-select: none; position: relative; background-color: transparent;" _echarts_instance_="ec_1470052027409"><div style="position: relative; overflow: hidden; width: 455px; height: 350px; cursor: default;"><canvas width="910" height="700" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 455px; height: 350px; -webkit-user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas></div><div style="position: absolute; display: none; border: 0px solid rgb(51, 51, 51); white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1), top 0.4s cubic-bezier(0.23, 1, 0.32, 1); border-radius: 4px; color: rgb(255, 255, 255); font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 14px; font-family: Arial, Verdana, sans-serif; line-height: 21px; padding: 5px; left: 254.333px; top: 208px; background-color: rgba(0, 0, 0, 0.498039);">12?<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:#26B99A"></span>sales : 3.3<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:#34495E"></span>purchases : 2.3</div></div>
                            </div>
                        </div>
                    </div>

                    <?php
                        $data = $db->query("SELECT idViviente, fechaNacimiento, nombre, sexo FROM viviente ");
                        $vivientes = array();
                        $contadorMenores = 0;
                        $contadorIntervalo2 = 0;
                        $contadorIntervalo3 = 0;
                        $contadorIntervalo4 = 0;
                        $contadorIntervalo5 = 0;
                        $contadorNoFecha = 0;
                        $contadorMayores = 0;
                        $contadorHombres = 0;
                        $contadorMujeres = 0;
                        $total = 0;
                        while($object = mysqli_fetch_object($data)){
                            $vivientes[]=$object;
                        }
                        if(!empty($vivientes)){
                            foreach ($vivientes as $viviente) {
                                if(!empty($viviente->fechaNacimiento) || $viviente->fechaNacimiento != null){
                                    $birthDate = $viviente->fechaNacimiento;
                                    $birthDate = explode("-", $birthDate);
                                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")? ((date("Y") - $birthDate[0]) - 1): (date("Y") - $birthDate[0]));
                                }else{
                                    $age = 0;  
                                }
                                if($age < 18){
                                    if($age==0){
                                        $contadorNoFecha++;
                                    }else{
                                        $contadorMenores++;
                                    }

                                }
                                if($age == 18 || $age == 19){
                                    $contadorIntervalo2++;
                                }
                                if($age == 20 || $age == 21){
                                    $contadorIntervalo3++;
                                }
                                if($age == 22 || $age == 23){
                                    $contadorIntervalo4++;
                                }
                                if($age == 24 || $age == 25){
                                    $contadorIntervalo5++;
                                }
                                if($age > 25){
                                    $contadorMayores++;
                                }

                                if($viviente->sexo == "M"){
                                    $contadorHombres++;
                                }
                                if($viviente->sexo == "F"){
                                    $contadorMujeres++;
                                }
                                $total++;
                            }
                        }else{
                            $contadorMenores = 0;
                            $contadorIntervalo2 = 1;
                            $contadorIntervalo3 = 1;
                            $contadorIntervalo4 = 1;
                            $contadorIntervalo5 = 1;
                            $contadorNoFecha = 1;
                            $contadorMayores = 1;
                            $contadorHombres = 1;
                            $contadorMujeres = 1;
                            $total = 1;

                        }
                        $db->close();
                    ?>


                    <!--Edades-->
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="x_panel fixed_height_320">
                                <div class="x_title">
                                    <h2>Edades</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table class="tile" style="width:100%">
                                        <tr>
                                            <th style="width:37%;">
                                                <span></span>
                                            </th>
                                            <th>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                    <span class="hidden-small">Rango</span>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                    <span class="hidden-small">Total</span>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                                            </td>
                                            <td>
                                                <table class="tile_info">
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square grey"></i>-18</p>
                                                        </td>
                                                        <td>
                                                            <?php
                                                               echo number_format($contadorMenores/$total*100,0); echo "%";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square blue"></i>18-19</p>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($contadorIntervalo2/$total*100,0); echo "%"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square green"></i>20-21</p>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($contadorIntervalo3/$total*100,0); echo "%"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square purple"></i>22-23</p>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($contadorIntervalo4/$total*100,0); echo "%"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square aero"></i>24-25</p>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($contadorIntervalo5/$total*100,0); echo "%"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square red"></i>25+</p>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($contadorMayores/$total*100,0); echo "%"; ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!--Hombres y Mujeres-->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="x_panel fixed_height_320">
                                <div class="x_title">
                                    <h2>Generos</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table class="tile" style="width:100%">
                                        <tr>
                                            <th style="width:37%;">
                                            </th>
                                            <th>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                    <span class="hidden-small">Genero</span>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                    <span class="hidden-small">%</span>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <canvas id="canvas2" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                                            </td>
                                            <td>
                                                <table class="tile_info">
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square blue"></i>Hombres</p>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($contadorHombres/$total*100,0); echo "%"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square red"></i>Mujeres</p>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($contadorMujeres/$total*100,0); echo "%"; ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--Cotizaciones-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Cotizaciones</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <table class="tile" style="width:100%">
                                        <tr>
                                            <th style="width:80%;">
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                    <span class="hidden-small">Genero</span>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                    <span class="hidden-small">%</span>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="x_content">
                                                    <div id="placeholder3xx3" class="demo-placeholder" style="width: 100%; height:250px;"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <table class="tile_info">
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square blue"></i>Total Campamento</p>
                                                            <p>$345678</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square red"></i>Restante A Pagar</p>
                                                            <p>$345678</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square green"></i>Ganancia Proyectada</p>
                                                            <p>$345678</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!--Cotizaciones-->
                        </div>
                    </div>
                </div>
@endsection