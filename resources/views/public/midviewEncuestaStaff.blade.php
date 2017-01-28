<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Encuesta Staff Campamento Nueva Especie">
    <meta name="author" content="Carlos Gonzalez">
    <link rel="icon" href="/images/lxmlogo.png">

    <title>Encuesta Staff Campamento Nueva Especie</title>

    <!-- Bootstrap core CSS -->

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/icheck/flat/green.css" rel="stylesheet" />
    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <!-- Switchery -->
    <link href="/css/switchery/switchery.min.css" rel="stylesheet">

    <script src="/js/jquery.min.js"></script>

</head>

<body>
    <!-- page content -->
    <br>
    <div class="row">
        <div lass="col-md-8 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
            <div class="page-title">
                <h3 style="color: white; text-align: center;">
                    Formulario Saff Campamento Nueva Especie
                </h3>
            </div>
        </div>
    </div>
    <br>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-8 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
            <div class="x_panel" >
                <div class="alert alert-danger" role="alert" id="mensajeStaff" style="display: none;"></div>
                <div class="x_content" id="contenido">
                    <br>
                    <div class="row"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h3>Es mi primera vez como Staff</h3>
                            <p>Da click aqui</p>
                            <hr>
                            <a href="{{ url('/encuestaStaffNuevo') }}" type="button" class="btn btn-primary">Aceptar</a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h3>Ya he sido Staff</h3>
                            {!! Form::open(['action' => 'StaffController@edit', 'method' => 'GET', 'class'=>'form-vertical']) !!}
                            <!--Pulsera-->
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {!! Form::select('id', array(), '',['class'=>'form-control select','id'=>'staffViejo', 'required'])!!}
                                </div>
                            </div>
                            <!--Boton-->
                            <br>
                            <hr>
                            <div class="form-group">
                                <a href="{{ url('/encuestaStaffNuevo') }}" type="button" class="btn btn-primary" id="viejoSubmit" href="{{url('/staff')}}/"+1+"/edit">Aceptar</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- custom js -->
    <script src="/js/custom.js"></script>
    <script type="text/javascript">
    $( document ).ready(function() {
        $.get("{{ url('staff')}}", 
            function(data) {
                var model = $('#staffViejo');
                model.empty();
                var staff = jQuery.parseJSON(data);
                $.each(staff, function(index, element) {
                    model.append("<option value='"+ element.id +"'>" + element.nombre +" "+ element.apellidoPaterno+" "+element.apellidoMaterno + "</option>");
                    });
                });
        });
    </script>
    <!-- Select 2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('select').select2({
            minimumResultsForSearch: 10
        });
        $('#staffViejo').on("select2:closing", function(e) {
           var id = $('#staffViejo').select2('val');
           console.log(id);
           $('#viejoSubmit').attr("href", "{{url('/staff')}}/"+id+"/edit")

        });
    </script>



</body>
</html>