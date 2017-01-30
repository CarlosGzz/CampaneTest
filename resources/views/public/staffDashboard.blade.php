<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina para staff de Dashboard Campamento Nueva Especie">
    <meta name="author" content="Carlos Gonzalez">
    <link rel="icon" href="/images/lxmlogo.png">

    <title>Dashboard de Campamento Nueva Especie Solo Staff</title>

    <!-- Bootstrap core CSS -->

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/popup.css" rel="stylesheet">
    <link href="/css/icheck/flat/green.css" rel="stylesheet" />


    <script src="/js/jquery.min.js"></script>


</head>


<body class="nav-md" >
<div class="container body">
<div class="main_container">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
            <div class="page-title">
                <h3 style="font-size:40px ;color: #9B9692; text-align: center;">
                    <img src="/images/logoNe.png" style="width:150px; height:auto;">
                    Staff Dashboard
                    <img src="/images/logoNe.png" style="width:150px; height:auto;">
                    <br>
                    Nueva Especie
                </h3>
            </div>
        </div>
    </div>
    <br>
    <div class="clearfix"></div>
    <!-- Page Content -->
    <div class="row ">
        <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
            <div class="x_panel">
                <div class="x_content">
                        <div class="row">
                            <div class="row top_tiles">
                                <div class="animated flipInY col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="tile-stats" >
                                        <h1>
                                            <div class="title_right" style="text-align: center;">
                                                <h2>Dias Para el Campamento</h2>
                                            </div>
                                        </h1>
                                        <h2>
                                            <br>
                                            <div id="countdown" style="text-align: center;"></div>
                                        </h2>
                                        <br>
                                    </div>
                                    <div class="tile-stats" >
                                        <h2>
                                            <div class="title_right" style="text-align: center;">
                                                Fases de Vivientes 
                                            </div>
                                        </h2>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <h1 style="text-align: center;">
                                                Fase 1
                                                <br>
                                                15 
                                                <h3 style="text-align: center;">Vivientes</h3>
                                            </h1>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <h1 style="text-align: center;">
                                                Fase 2
                                                <br>
                                                25
                                                <h3 style="text-align: center;">Vivientes</h3>
                                            </h1>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <h1 style="text-align: center;">
                                                Fase 3
                                                <br>
                                                5
                                                <h3 style="text-align: center;">Vivientes</h3>
                                            </h1>
                                        </div>
                                        <h1 style="text-align: center;">
                                </h1>
                                        <br>
                                    </div>
                                    <div class="tile-stats" style="text-align:center;">
                                        <h2>
                                            <a href="https://www.facebook.com/events/446885282102404/">Evento Facebook</a>
                                            <br>
                                            <br>
                                            <a href="/encuestaVivientes">Encuesta Vivientes</a>
                                            <br><p>link corto <a href="">goo.gl/g538NB</a></p>
                                            <br>
                                            <a href="/encuestaStaff">Encuesta Staff</a>
                                            <!--<a href="">Facebook</a>-->
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="tile-stats" id="calendarios">
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Enero</a>
                                                    </li>
                                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Febrero</a>
                                                    </li>
                                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Marzo</a>
                                                    </li>
                                                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Abril</a>
                                                    </li>
                                                </ul>
                                                <div id="myTabContent" class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="" data-toggle="modal" data-target=".bs-enero-modal-lg">
                                                        <img style ="width:100%; height: 100%;"src="/images/enero.jpeg">
                                                        <!-- Large Septiembre -->
                                                        <div class="modal fade bs-enero-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Calendario Enero</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img style ="width:100%; height: 100%;"src="/images/enero.jpeg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab" data-toggle="modal" data-target=".bs-febrero-modal-lg">
                                                        <img style ="width:100%; height: 100%;"src="/images/febrero.jpeg">
                                                        <!-- Large Septiembre -->
                                                        <div class="modal fade bs-febrero-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Calendario Febrero</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img style ="width:100%; height: 100%;"src="/images/febrero.jpeg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade " id="tab_content3" aria-labelledby="profile-tab" data-toggle="modal" data-target=".bs-marzo-modal-lg">
                                                        <img style ="width:100%; height: 100%;"src="/images/marzo.jpeg">
                                                        <!-- Large AGOSTO -->
                                                        <div class="modal fade bs-marzo-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Calendario Marzo</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img style ="width:100%; height: 100%;"src="/images/marzo.jpeg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade " id="tab_content4" aria-labelledby="profile-tab" data-toggle="modal" data-target=".bs-abril-modal-lg">
                                                        <img style ="width:100%; height: 100%;"src="/images/abril.jpeg">
                                                        <!-- Large AGOSTO -->
                                                        <div class="modal fade bs-abril-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Calendario Abril</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img style ="width:100%; height: 100%;"src="/images/abril.jpeg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fast Insights Vivientes-->
                        <div class="row">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3> Vivientes <small></small></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row top_tiles" style="margin: 10px 0;">
                            <div class="row top_tiles">
                                <!--Viventes Pagados-->
                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-money"></i></div>
                                        <div class="count" id="vivientesPagados">
                                            0
                                        </div>
                                        <h3>Pagados</h3>
                                        <p> </p>
                                    </div>
                                </div>
                                <!--/Viventes Pagados-->
                                <!--Viventes Registrados-->
                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-user"></i></div>
                                        <div class="count" id="vivientesRegistrados">
                                            0
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
                                        <div class="count" id="vacantes">
                                            0
                                        </div>
                                        <h3>Vacantes</h3>
                                        <p></p>
                                    </div>
                                </div>
                                <!--/Viventes Vacantes-->
                            </div>
                        </div>
                        <!--/Fast Insights Vivientes-->

                        <!--Fast Insights Staff-->
                        <div class="row">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3> Staff <small></small></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row top_tiles">
                            <div class="row top_tiles">
                                <!--Staff Pagados-->
                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon4" ><i class="fa fa-money"></i></div>
                                        <div class="count" id="staffPagados">
                                            0
                                        </div>
                                        <h3>Pagados</h3>
                                        <p> </p>
                                    </div>
                                </div>
                                <!--/Staff Pagados-->
                                <!--Staff Asistentes-->
                                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon4"><i class="fa fa-check"></i></div>
                                        <div class="count" id="staffAsistentes">
                                            0
                                        </div>
                                        <h3>Asistentes</h3>
                                        <p></p>
                                    </div>
                                </div>
                                <!--/Staff Asistentes-->
                                <!--Staff Registrados-->
                                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon4"><i class="fa fa-user"></i></div>
                                        <div class="count" id="staffRegistrados">
                                            0
                                        </div>
                                        <h3>Total</h3>
                                        <p> </p>
                                    </div>
                                </div>
                                <!--/Staff Registrados-->
                                <!--Staff Viejos/Nuevos-->
                                <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon4" style="color: #2196f3;">
                                            <td>
                                                <canvas id="canvas3" height="50" width="50" style="margin: 0px 0px 0px 0px"></canvas>
                                            </td>
                                        </div>
                                        <div class="count" id="staffViejosNuevos">
                                            0/0
                                        </div>
                                        <h3>Viejos/Nuevos</h3>
                                        <p></p>
                                    </div>
                                </div>
                                <!--/Staff Viejos/Nuevos-->
                            </div>
                        </div>
                        <br>
                </div>

               
                <!--Graph ROW-->
                <div class="row">
                    <!--Edades-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="x_panel fixed_height_320">
                            <div class="x_title">
                                <h2>Edades Vivientes</h2>
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
                                                    <td id='intervalo1'>
                                                        0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square blue"></i>18-19</p>
                                                    </td id='intervalo2'>
                                                    <td>
                                                        0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square green"></i>20-21</p>
                                                    </td>
                                                    <td id='intervalo3'>
                                                        0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square purple"></i>22-23</p>
                                                    </td>
                                                    <td id='intervalo4'>
                                                        0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square aero"></i>24-25</p>
                                                    </td>
                                                    <td id='intervalo5'>
                                                        0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square red"></i>25+</p>
                                                    </td>
                                                    <td id='mayores'>
                                                        0
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
                                <h2>Genero Vivientes</h2>
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
                                                <span class="hidden-small">Genero Vivientes</span>
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
                                                    <td id="hombres">
                                                        0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><i class="fa fa-square red"></i>Mujeres</p>
                                                    </td>
                                                    <td id="mujeres">
                                                        0
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer content -->
            <footer>
                <div class="">
                    <p class="pull-right">Campamento Nueva Especie Dashboard | Made With Love & Code
                    </p>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <!-- /Page Content -->

    <script src="/js/bootstrap.min.js"></script>
    <!-- chart js -->
    <script src="/js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!--Custom js-->
    <script src="/js/custom.js"></script>
    <!--countdown js-->
    <script src="/js/countdown/jquery.countdown.js"></script>
    <script type="text/javascript">
        $('#countdown').countdown('2017/04/21', function(event) {
            $(this).html(event.strftime('<h1 style="text-align: center;"> %w Semanas %d Dias %H:%M:%S Horas </h1>'));
        });
    </script>

    <!-- Script para llenar la informacion de las ChartJS -->
    <script>
    var edadesDoughnutData;
    var hombresMujeresPieData;
        function edadesChart(){
            $.ajax({
                url: "{{ route('vivientes.edadesChartData')}}",
                dataType: 'json',
                success: function(data) {
                    $("#intervalo1").empty();
                    $("#intervalo1").html(data.intervalo1);

                    $("#intervalo2").empty();
                    $("#intervalo2").html(data.intervalo2);

                    $("#intervalo3").empty();
                    $("#intervalo3").html(data.intervalo3);

                    $("#intervalo4").empty();
                    $("#intervalo4").html(data.intervalo4);

                    $("#intervalo5").empty();
                    $("#intervalo5").html(data.intervalo5);

                    $("#mayores").empty();
                    $("#mayores").html(data.mayores);

                    $("#canvas1").empty();
                    edadesDoughnutData = [
                        {
                            value: parseInt(data.intervalo1),
                            color: "#070D0D"
                        },
                        {
                            value: parseInt(data.intervalo2),
                            color: "#3498DB"
                        },
                        {
                            value: parseInt(data.intervalo3),
                            color: "#1ABB9C"
                        },
                        {
                            value: parseInt(data.intervalo4),
                            color: "#9B59B6"
                        },
                        {
                            value: parseInt(data.intervalo5),
                            color: "#9CC2CB"
                        },
                        {
                            value: parseInt(data.mayores),
                            color: "#E74C3C"
                        }
                    ];
                    var edadesDoughnut = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(edadesDoughnutData);
                }
            });
        }
        function generoChart(){
            $.ajax({
                url: "{{ route('vivientes.generoChartData')}}",
                dataType: 'json',
                success: function(data) {
                    $("#canvas2").empty();
                    $("#hombres").empty();
                    $("#hombres").html(data.hombres);
                    $("#mujeres").empty();
                    $("#mujeres").html(data.mujeres);
                    hombresMujeresPieData = [
                        {
                            value: parseInt(data.hombres),
                            color: "#3498Db"
                        },
                        {
                            value: parseInt(data.mujeres),
                            color: "#E74C3C"
                        }
                    ];
                    var hombresMujeresPie = new Chart(document.getElementById("canvas2").getContext("2d")).Pie(hombresMujeresPieData);
                }
            });
        }
    </script>

    <!-- Ajax para Vivientes Tiles -->
    <script type="text/javascript">
        var pagados=0;
        function vivientesPagadosAjax(){
            $.ajax({
                url: "{{ route('vivientes.pagadosContador')}}",
                dataType: 'json',
                success: function(data) {
                    $("#vivientesPagados").empty();
                    $("#vivientesPagados").html(data); 
                    pagados = data;
                }
            });
        }
        function vivientesRegistradosAjax(){
            $.ajax({
                url: "{{ route('vivientes.registradosContador')}}",
                dataType: 'json',
                success: function(data) {
                    $("#vivientesRegistrados").empty();
                    $("#vivientesRegistrados").html(data);
                }
            });
        }
        function vacantesAjax(){
            $("#vacantes").empty();
            $("#vacantes").html(45-pagados); 
        }
    </script>

    <!-- Ajax para staff Tiles -->
    <script type="text/javascript">
        var pagados=0;
        function staffPagadosAjax(){
            $.ajax({
                url: "{{ route('staff.pagadosContador')}}",
                dataType: 'json',
                success: function(data) {
                    $("#staffPagados").empty();
                    $("#staffPagados").html(data); 
                    pagados = data;
                }
            });
        }
        function staffAsistentesAjax(){
            $.ajax({
                url: "{{ route('staff.asistentesContador')}}",
                dataType: 'json',
                success: function(data) {
                    $("#staffAsistentes").empty();
                    $("#staffAsistentes").html(data);
                }
            });
        }
        function staffRegistradosAjax(){
            $.ajax({
                url: "{{ route('staff.registradosContador')}}",
                dataType: 'json',
                success: function(data) {
                    $("#staffRegistrados").empty();
                    $("#staffRegistrados").html(data);
                }
            });
        }
        function staffViejosNuevosAjax(){
            $.ajax({
                url: "{{ route('staff.viejosNuevos')}}",
                dataType: 'json',
                success: function(data) {
                    $("#staffViejosNuevos").empty();
                    $("#staffViejosNuevos").html(data.viejos+'/'+data.nuevos);
                    var viejosnuevosPieData = [
                    {
                        value: data.viejos,
                        color: "#070D0D"
                    },
                    {
                        value: data.nuevos,
                        color: "#2196f3"
                    }
                    ];
                    var viejosnuevosPie = new Chart(document.getElementById("canvas3"). getContext("2d")).Pie(viejosnuevosPieData);
                }
            });
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            edadesChart();
            generoChart();
            staffViejosNuevosAjax();
            setInterval(function(){
                vivientesPagadosAjax();
                vivientesRegistradosAjax();
                vacantesAjax();

                staffRegistradosAjax();
                staffAsistentesAjax();
                staffPagadosAjax();
            }, 2000);
        });
    </script>

</div>
</div>
</body>

</html>