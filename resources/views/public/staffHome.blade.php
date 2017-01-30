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
    <link rel="icon" href="../VIEW/IMG/lxmlogo.png">

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
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-10 col-md-offset-3 col-sm-offset-3 col-xs-offset-1">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="">
                                <div id="wrapper">
                                    <div>
                                       <section class="login_content">
                                            <div>
                                                <h4>Ingresa la contraseña para ver el contenido</h4>
                                            </div>
                                            <div class="separator"></div>
                                            {!! Form::open(['route' => 'staff.dashboard', 'method' => 'POST','name'=>'form']) !!}
                                             <div>
                                                <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required="" />
                                             </div>
                                             <div>
                                                <button type="submit" class="btn btn-default submit" id="envia" onclick="submit()">Log in</button>
                                             </div>
                                             <div class="clearfix"></div>
                                             <div class="separator"></div>
                                          </form>
                                          <!-- form -->
                                       </section>
                                       <!-- content -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>