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
                    {{$staffPagados = 0}}
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
                    {{$staffAsistentes = 0}}
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
                    {{$staffRegistrados = 0}}
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
                    {{$staffViejosNuevos = 0}}
                </div>
                <h3 style="font-size: 12px;">Viejos/Nuevos</h3>
                <p></p>
            </div>
        </div>
        <!--/Staff Viejos/Nuevos-->
    </div>
</div>