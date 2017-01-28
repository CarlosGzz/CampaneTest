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
            <div class="tile-stats" id="vivientesPagados">
                <div class="icon"><i class="fa fa-money"></i></div>
                <div class="count">
                    {{$totalPagados = 0}}
                </div>
                <h3>Pagados</h3>
                <p></p>
            </div>
        </div>
        <!--/Viventes Pagados-->
        <!--Viventes Encuestados-->
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-file-text"></i></div>
                <div class="count">
                    {{$totalEncuestados = 0}}
                </div>
                <h3>Ecuestados</h3>
                <p></p>
            </div>
        </div>
        <!--/Viventes Encuestados-->
        <!--Viventes Vacantes-->
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-group"></i></div>
                <div class="count">
                    {{$totalVacantes = 0}}
                </div>
                <h3>Vacantes</h3>
                <p></p>
            </div>
        </div>
        <!--/Viventes Vacantes-->
    </div>
</div>
<!--/Fast Insights Vivientes-->