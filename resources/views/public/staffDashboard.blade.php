@extends('layouts.public')
@section('metas')
    <meta name="description" content="Pagina para staff de Dashboard Campamento Nueva Especie">
@endsection
@section('title')
    Dashboard de Campamento Nueva Especie Solo Staff
@endsection
@section('content')
    <div class="container body">
        <div class="main_container">
            <!-- Titulo -->
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

            <!-- Contenido -->
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
                                                    <li role="presentation" ><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Enero</a>
                                                    </li>
                                                    <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Febrero</a>
                                                    </li>
                                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Marzo</a>
                                                    </li>
                                                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Abril</a>
                                                    </li>
                                                </ul>
                                                <div id="myTabContent" class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade " id="tab_content1" aria-labelledby="" data-toggle="modal" data-target=".bs-enero-modal-lg">
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
                                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab" data-toggle="modal" data-target=".bs-febrero-modal-lg">
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
                            @include('vivientes.vivientesTilesStaffDashboard')
                            @include('staff.staffTilesStaffDashboard')
                            <br>
                        </div>
                        @include('vivientes.vivientesChartsStaffDashboard')
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
            @include('public.staffDashboardJavascript')
        </div>
    </div>
@endsection