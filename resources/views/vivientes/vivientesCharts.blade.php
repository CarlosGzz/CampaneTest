<!--Fast Insights Vivientes-->
<div class="row">
    <div class="page-title">
        <div class="title_left">
            <h3> Graficas de Vivientes Pagados <small></small></h3>
        </div>
    </div>
</div>
<!--Edades-->
<div class="col-md-6 col-sm-6 col-xs-12">
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
<div class="col-md-6 col-sm-6 col-xs-12">
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
