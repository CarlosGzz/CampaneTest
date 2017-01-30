<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">

        <!--Titulo del app-->
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img id="mainIcon" style="width:30px;height:30px" src="/images/lxmlogo.png" alt="Logo Latiendo Por Mexico">
                <span>Nueva Especie</span>
            </a>
        </div>
        <div class="clearfix"></div>
        <!--/Titulo del app-->

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="/images/profile{{ Auth::user()->user }}.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Hola,</span>
                <h2>
                    {{ Auth::user()->name }}
                </h2>
            </div>
        </div>
        <!-- /menu prile quick info -->

        <br />

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">
                    <!--Dashboard Menu-->
                    <li class="active" >
                        <a href="{{ url('/home') }}"> 
                            <i class="fa fa-bar-chart"></i>
                            Dashboard
                        </a>
                    </li>
                    <!--/Dashboard Menu-->

                    <!--Vivientes Menu-->
                    <li>
                        <a>
                            <i class="fa fa-users"></i>Vivientes
                            <span class="fa fa-chevron-down">
                            </span>
                        </a>
                        <ul class="nav child_menu" style="display: none">
                            <li>
                                <a href="{{ url('/vivientes') }}">Vivientes</a>
                            </li>
                            <li>
                                <a href="{{ url('/vivientes/familiares') }}">Familiares</a>
                            </li>
                            <li>
                                <a href="{{ url('/vivientes/palancas') }}">Palancas</a>
                            </li>
                            <li>
                                <a href="{{ url('/vivientes/encuesta') }}">Encuesta</a>
                            </li>
                        </ul>
                    </li>
                    <!--/Vivientes Menu-->

                    <!--Staff Menu-->
                    <li>
                        <a>
                            <i class="fa fa-star"></i>Staff
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu" style="display: none">
                            <li>
                                <a href="{{ url('/staff/miembros') }}">Miembros</a>
                            </li>
                            <li>
                                <a href="{{ url('/staff/campamento-actual') }}">Campamento Actual</a>
                            </li>
                            <li>
                                <a href="{{ url('/staff/asistencias') }}">Asistencias</a>
                            </li>
                            <li>
                                <a href="{{ url('/staff/pagos') }}">Pagos</a>
                            </li>
                            <li>
                                <a href="{{ url('/staff/vehiculos') }}">Vehiculos</a>
                            </li>
                        </ul>
                    </li>
                    <!--/Staff Menu-->
                    <!--Finanzas Menu-->
                    <li>
                        <a>
                            <i class="fa fa-bank"></i>Finanzas
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu" style="display: none">
                            <li>
                                <a href="{{ url('/finanzas/ingresos-egresos') }}">Ingresos/Egresos</a>
                            </li>
                        </ul>
                    </li>
                    <!--/Finanzas Menu-->

                    <!--Logistica Menu-->
                    <li>
                        <a>
                            <i class="fa fa-gear"></i>Logística
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu" style="display: none">
                            <li>
                                <a href="{{ url('/logistica/operativo') }}">Operativo</a>
                            </li>
                            <li>
                                <a href="{{ url('/logistica/cocina') }}">Cocina</a>
                            </li>
                            <li>
                                <a href="{{ url('/logistica/back') }}">Back</a>
                            </li>
                            <li>
                                <a href="{{ url('/logistica/paramedico') }}">Paramedico</a>
                            </li>
                            <li>
                                <a href="{{ url('/logistica/proveedores') }}">Proveedores</a>
                            </li>
                        </ul>
                    </li>
                    <!--Logistica Menu-->

                    <!--Recursos Humanos Menu-->
                    <li>
                        <a>
                            <i class="fa fa-heart"></i>Recursos Humanos
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu" style="display: none">
                            <li>
                                <a href="{{ url('/recursosHumanos') }}">Estadisticas</a>
                            </li>
                        </ul>
                    </li>
                    <!--/Recursos Humanos Menu-->
                    @if(Auth::user()->tipo == "coordinador" || Auth::user()->tipo == "admin")
                    <!--Coordinación Menu-->
                    <li>
                        <a>
                            <i class="fa fa-user"></i>Coordinación
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu" style="display: none">
                            <li>
                                <a href="{{ url('/coornidacion/historial') }}">Historial</a>
                            </li>
                            <li>
                                <a href="{{ url('/coordinacion/estadisticas') }}">Estadisticas</a>
                            </li>
                        </ul>
                    </li>
                    <!--/Coordinación Menu-->
                    

                    @if(Auth::user()->tipo == "admin")
                    <!--Admin Menu-->
                    <li>
                        <a href="{{ url('/webadmin') }}"><i class='fa fa-code'></i>AdminSite
                        </a>
                    </li>
                    <!--/Admin Menu-->
                    @endif
                    @endif

                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        @include('includes/footerMenu')
    </div>
</div>