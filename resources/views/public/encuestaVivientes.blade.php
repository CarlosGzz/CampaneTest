<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Formulario Vivientes Campamento Nueva Especie">
    <meta name="author" content="Carlos Gonzalez">
    <link rel="icon" href="/images/lxmlogo.png">

    <title>Formulario Vivientes Campamento Nueva Especie</title>

    <!-- Bootstrap core CSS -->

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/icheck/flat/green.css" rel="stylesheet" />

    <!-- Select2 -->
    <link href="/css/select/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="/css/switchery/switchery.min.css" rel="stylesheet">
    <!-- Flat Picker -->
    <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">

    <script src="/js/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>
    <!-- bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="/js/custom.js"></script>
    <!-- bootstrap progress js -->
    <script src="/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="/js/icheck/icheck.min.js"></script>
    <!-- Select2 -->
    <script src="/js/select/select2.full.js"></script>
    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Selecciona una Cualidad",
          allowClear: true
        });
        $("#staff").select2({
          placeholder: "Selecciona un Miembro",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->
    <!-- Parsley -->
    <script src="/js/parsley/parsley.min.js"></script>
    <script>
      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#siguiente').on('click', function() {
          $('#datosPersonales').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#datosPersonales').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
      try {
        hljs.initHighlightingOnLoad();
      } catch (err) {}
    </script>
    <script>
        $("#fechaNacimiento").change(function(){
            var fechaNacimiento = new Date($('#fechaNacimiento').val());
            var hoy = new Date();
            if (fechaNacimiento > hoy){
                alert("Fecha mayor al dia de hoy");
                $("#fechaNacimiento").val('');
            }
        });
    </script>
    <!-- /Parsley -->
    <!-- Script para dar de alta al viviente con ajax--> 
    <script type="text/javascript">
        function submit(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //alert("hey");
            if($('#datosFamiliar').parsley().isValid() == true){
                $('#datosFamiliar').parsley().validate();
                //alert("ho");
                //Datos Personales
                var nombre = $("#nombre").val();
                var apellidoPaterno = $("#apellidoPaterno").val();
                var apellidoMaterno = $("#apellidoMaterno").val();
                var genero = $("#genero:checked").val();
                var fechaNacimiento = String($("#fechaNacimiento").val());
                var celular = $("#telefonoCel").val();
                var telefonoCasa = $("#telefonoCasa").val();
                var correo = $("#correo").val();
                var restriccionesAlimentarias = $("#restriccionesAlimentarias:checked").val();
                var alergias = $("#alergias").val();
                var medioCampamento = $("#medioCampamento").val();
                if(medioCampamento == "Miembro de Staff"){
                    var staff = $("#staff").val();
                    if(staff == "Otro"){
                        var otroStaff = $("#otroStaff").val();
                    }else{
                        var otroStaff = "";
                    }
                }else{
                    var otroStaff = "";
                    var staff ="";
                }

                //Encuesta
                var reservado = $("#reservado:checked").val();
                var sabiduria = $("#sabiduria:checked").val();
                var idealista = $("#idealista:checked").val();
                var explosivo = $("#explosivo:checked").val();
                var optimismo = $("#optimismo:checked").val();
                var prudencia = $("#prudencia:checked").val();
                var disciplina = $("#disciplina:checked").val();
                var pasion = $("#pasion:checked").val();
                var hipersensibilidad = $("#hipersensibilidad:checked").val();
                var generosidad = $("#generosidad:checked").val();
                var handy = $("#handy:checked").val();
                var teson = $("#teson:checked").val();
                var elocuente = $("#elocuente:checked").val();
                var aventado = $("#aventado:checked").val();
                var empatia = $("#empatia:checked").val();
                var misterioso = $("#misterioso:checked").val();
                var fortaleza = $("#fortaleza:checked").val();
                var improvisar = $("#improvisar:checked").val();
                var afable = $("#afable:checked").val();
                var lealtad = $("#lealtad:checked").val();
                var franco = $("#franco:checked").val();
                var sobreprotector = $("#sobreprotector:checked").val();
                var creativo = $("#creativo:checked").val();
                var movido = $("#movido:checked").val();
                var triunfar = $("#triunfar:checked").val();
                var personalidad = $("#actitudAPersonalidad").val();
                var mismo = $("#descripcionUnoMismo").val();
                var cualidades = $("#cualidades").val();
                var defectos = $("#defectos").val();
                var fiesta = $("#fiestaMeGusta:checked").val();

                //Datos Familares
                var nombrePadre = $("#nombrePadre").val();
                var telefonoPadre = $("#telefonoPadre").val();
                var celularPadre = $("#celularPadre").val();
                var correoPadre = $("#correoPadre").val();

                var nombreMadre = $("#nombreMadre").val();
                var telefonoMadre = $("#telefonoMadre").val();
                var celularMadre = $("#celularMadre").val();
                var correoMadre = $("#correoMadre").val();

                var nombreAmigo1 = $("#nombreAmigo1").val();
                var telefonoAmigo1 = $("#telefonoAmigo1").val();
                var celularAmigo1 = $("#celularAmigo1").val();
                var correoAmigo1 = $("#correoAmigo1").val();

                var nombreAmigo2 = $("#nombreAmigo2").val();
                var telefonoAmigo2 = $("#telefonoAmigo2").val();
                var celularAmigo2 = $("#celularAmigo2").val();
                var correoAmigo2 = $("#correoAmigo2").val();

                var nombreAmigo3 = $("#nombreAmigo3").val();
                var telefonoAmigo3 = $("#telefonoAmigo3").val();
                var celularAmigo3 = $("#celularAmigo3").val();
                var correoAmigo3 = $("#correoAmigo3").val();
                
                // Returns successful data submission message when the entered information is stored in database.
                if(nombre==''|| apellidoPaterno=='' || apellidoMaterno=='' || genero==''|| fechaNacimiento==''|| celular==''||telefonoCasa==''||correo==''|| restriccionesAlimentarias==''|| medioCampamento==''||reservado=='' ||sabiduria=='' ||idealista=='' ||explosivo=='' ||optimismo=='' ||prudencia=='' ||disciplina=='' ||pasion=='' ||hipersensibilidad=='' ||generosidad=='' ||handy=='' ||teson=='' ||elocuente=='' ||aventado=='' ||empatia=='' ||misterioso=='' ||fortaleza=='' ||improvisar=='' ||afable=='' ||lealtad=='' ||franco=='' ||sobreprotector=='' ||creativo=='' ||movido=='' ||triunfar=='' ||personalidad=='' ||mismo=='' ||cualidades=='' ||defectos=='' ||fiesta=='' ||nombrePadre=='' ||celularPadre=='' ||correoPadre=='' ||nombreMadre=='' ||celularMadre=='' ||correoMadre=='' ||nombreAmigo1=='' ||celularAmigo1=='' ||correoAmigo1=='' ||nombreAmigo2=='' ||celularAmigo2=='' ||correoAmigo2=='' ||nombreAmigo3=='' ||celularAmigo3=='' ||correoAmigo3=='') {
                    alert("falta algo");
                    //alert(nombre+"\n"+apellidoPaterno+"\n"+apellidoMaterno+"\n"+genero+"\n"+fechaNacimiento+"\n"+celular+"\n"+telefonoCasa+"\n"+correo+"\n"+restriccionesAlimentarias+"\n"+alergias+"\n"+medioCampamento+"\n"+reservado+"\n"+sabiduria+"\n"+idealista+"\n"+explosivo+"\n"+optimismo+"\n"+prudencia+"\n"+disciplina+"\n"+pasion+"\n"+hipersensibilidad+"\n"+generosidad+"\n"+handy+"\n"+teson+"\n"+elocuente+"\n"+aventado+"\n"+empatia+"\n"+misterioso+"\n"+fortaleza+"\n"+improvisar+"\n"+afable+"\n"+lealtad+"\n"+franco+"\n"+sobreprotector+"\n"+creativo+"\n"+movido+"\n"+triunfar+"\n"+personalidad+"\n"+mismo+"\n"+cualidades+"\n"+defectos+"\n"+fiesta+"\n"+nombrePadre+"\n"+celularPadre+"\n"+correoPadre+"\n"+nombreMadre+"\n"+celularMadre+"\n"+correoMadre+"\n"+nombreAmigo1+"\n"+celularAmigo1+"\n"+correoAmigo1+"\n"+nombreAmigo2+"\n"+celularAmigo2+"\n"+correoAmigo2+"\n"+nombreAmigo3+"\n"+celularAmigo3+"\n"+correoAmigo3);
                }else{
                // AJAX Code To Submit Form.
                    $.ajax({
                        type: "POST",
                        url: 'https://campamentone.herokuapp.com/vivientesEncuestaSend',
                        data: {nombre:nombre, apellidoPaterno:apellidoPaterno, apellidoMaterno:apellidoMaterno, genero:genero, fechaNacimiento:fechaNacimiento, celular:celular, telefonoCasa:telefonoCasa,correo:correo,restriccionesAlimentarias:restriccionesAlimentarias,alergias:alergias,medioCampamento:medioCampamento,staff:staff,otroStaff:otroStaff,reservado:reservado,sabiduria:sabiduria,idealista:idealista,explosivo:explosivo,optimismo:optimismo,prudencia:prudencia,disciplina:disciplina,pasion:pasion,hipersensibilidad:hipersensibilidad,generosidad:generosidad,handy:handy,teson:teson,elocuente:elocuente,aventado:aventado,empatia:empatia,misterioso:misterioso,fortaleza:fortaleza,improvisar:improvisar,afable:afable,lealtad:lealtad,franco:franco,sobreprotector:sobreprotector,creativo:creativo,movido:movido,triunfar:triunfar,personalidad:personalidad,mismo:mismo,cualidades:cualidades,defectos:defectos,fiesta:fiesta,nombrePadre:nombrePadre,telefonoPadre:telefonoPadre,celularPadre:celularPadre,correoPadre:correoPadre,nombreMadre:nombreMadre,telefonoMadre:telefonoMadre,celularMadre:celularMadre,correoMadre:correoMadre,nombreAmigo1:nombreAmigo1,telefonoAmigo1:telefonoAmigo1,celularAmigo1:celularAmigo1,correoAmigo1:correoAmigo1,nombreAmigo2:nombreAmigo2,telefonoAmigo2:telefonoAmigo2,celularAmigo2:celularAmigo2,correoAmigo2:correoAmigo2,nombreAmigo3:nombreAmigo3,telefonoAmigo3:telefonoAmigo3,celularAmigo3:celularAmigo3,correoAmigo3:correoAmigo3},
                        cache: false,
                        success: function(result){
                            if(result=='1'){
                                window.location.replace("{{ url('gracias') }}");
                            }else{
                                if(result=="2"){
                                    $('#mensajeViviente').empty(),
                                    $('#mensajeViviente').removeClass("alert alert-success")
                                    $('#mensajeViviente').addClass("alert alert-danger"),
                                    $('#mensajeViviente').show(),
                                    $('#mensajeViviente').html('<span aria-hidden="true"><i class="fa fa-close"></i></span> Error al hacer la encuesta ');

                                }else{
                                    $('#mensajeViviente').empty(),
                                    $('#mensajeViviente').removeClass("alert alert-success")
                                    $('#mensajeViviente').addClass("alert alert-danger"),
                                    $('#mensajeViviente').show(),
                                    $('#mensajeViviente').html('<span aria-hidden="true"><i class="fa fa-close"></i></span> Error al hacer la encuesta ');
                                }
                            }
                            //alert(result);
                        }
                    });
                }
                return false;
            }else{
                $('#datosFamiliar').parsley().validate();
                $('#wizard').smartWizard('fixHeight','none');
                //alert("he");
            }
        };
    </script>
    <!--Tooltip-->
    <script type="text/javascript">
        $("#datosPersonales :input").tooltip({
 
        // place tooltip on the right edge
        position: "center right",
 
        // a little tweaking of the position
        offset: [-2, 10],
 
        // use the built-in fadeIn/fadeOut effect
        effect: "fade",
 
        // custom opacity setting
        opacity: 0.7
 
        });

        $("#cualidades1").attr('title', "Asigna un número de importancia a cada cualidad, no repitas números dentro de esta categoría. 1 siendo con la cualidad que más te identificas, 5 con la que menos.");
        $("#cualidades2").attr('title', "Asigna un número de importancia a cada cualidad, no repitas números dentro de esta categoría. 1 siendo con la cualidad que más te identificas, 5 con la que menos.");
        $("#cualidades3").attr('title', "Asigna un número de importancia a cada cualidad, no repitas números dentro de esta categoría. 1 siendo con la cualidad que más te identificas, 5 con la que menos.");
        $("#cualidades4").attr('title', "Asigna un número de importancia a cada cualidad, no repitas números dentro de esta categoría. 1 siendo con la cualidad que más te identificas, 5 con la que menos.");
        $("#cualidades5").attr('title', "Asigna un número de importancia a cada cualidad, no repitas números dentro de esta categoría. 1 siendo con la cualidad que más te identificas, 5 con la que menos.");
    </script>
    <!--/Tooltip-->
    <!-- jQuery Smart Wizard -->
    <script src="/js/wizard/jquery.smartWizard.js"></script>
    <script>
      $(document).ready(function() {

            $('#wizard').smartWizard({
                transitionEffect: 'fade',
                keyNavigation: true,
                onLeaveStep:leaveAStepCallback,
                onFinish:submit,
                labelNext: 'Siguiente',
                labelPrevious: 'Anterior',
                labelFinish: 'Enviar',
                hideButtonsOnDisabled: true
            });

            $('.buttonNext').addClass('btn btn-success');
            $('.buttonNext').attr('id', 'siguiente');
            $('.buttonPrevious').addClass('btn btn-primary');
            $('.buttonPrevious').attr('id', 'anterior');
            $('.buttonFinish').addClass('btn btn-success');
            $('.buttonFinish').attr('id', 'submit');

            function leaveAStepCallback(obj){
                var step_num= obj.attr('rel');
                return validateSteps(step_num);
              }
            function validateSteps(step){
                var isStepValid = true;
                // validate step 1
                if(step == 1){
                    if($('#datosPersonales').parsley().isValid() == false){
                        $('#datosPersonales').parsley().validate();
                        
                        isStepValid = false; 
                        $('#wizard').smartWizard('showMessage','Por favor corrige los datos en el paso '+step+ ' e intenta de nuevo.');
                        $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});
                        $('#wizard').smartWizard('fixHeight','none');         
                    }else{
                        $('#wizard').smartWizard('hideMessage');
                        $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
                        $('#wizard').smartWizard('fixHeight','none');
                    }
                }

                if(step == 2){
                    if($('#encuestaForma').parsley().isValid() == false){
                        $('#encuestaForma').parsley().validate();
                        $('#encuestaForma1').parsley().validate();
                        $('#encuestaForma2').parsley().validate();
                        $('#encuestaForma3').parsley().validate();
                        isStepValid = false; 
                        $('#wizard').smartWizard('showMessage','Por favor corrige los datos en el paso '+step+ ' e intenta de nuevo.');
                        $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});
                        $('#wizard').smartWizard('fixHeight','none');         
                    }else{
                        $('#wizard').smartWizard('hideMessage');
                        $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
                        $('#wizard').smartWizard('fixHeight','none');
                    }
                }
                if(step == 3){
                    if($('#datosFamiliar').parsley().isValid() == false){
                        $('#datosFamiliar').parsley().validate();
                        
                        isStepValid = false; 
                        $('#wizard').smartWizard('showMessage','Por favor corrige los datos en el paso '+step+ ' e intenta de nuevo.');
                        $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});
                        $('#wizard').smartWizard('fixHeight','none');         
                    }else{
                        $('#wizard').smartWizard('hideMessage');
                        $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
                        $('#wizard').smartWizard('fixHeight','none');
                    }
                }
                $('#wizard').smartWizard('fixHeight','none');
                return isStepValid;
            }

        });
    </script>
    <!-- /jQuery Smart Wizard -->
    <!-- Validacion de Tablas Radio-->
    <script>
        $(function() {
            var col, el;
            
            $("input[type=radio]").click(function() {
               el = $(this);
               col = el.data("col");
               $("input[data-col=" + col + "]").prop("checked", false);
               el.prop("checked", true);
            });
        });
    </script>
    <!-- /Validacion de Tablas Radio-->
    

    <!-- page content -->
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
            <div class="page-title">
                    <h3 style="font-size:40px ;color: #9B9692; text-align: center;">
                        <img src="/images/logoNe.png" style="width:150px; height:auto;">
                        Formulario
                        <img src="/images/logoNe.png" style="width:150px; height:auto;">
                        <br>
                        Nueva Especie
                    </h3>
            </div>
        </div>
    </div>
    <br>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
            <div class="x_panel">
                <div class="x_content">
                    <!-- Smart Wizard -->
                    
                    <div id="wizard" class="form_wizard wizard_horizontal">
                        <ul class="wizard_steps">
                            <li>
                                <a href="#step-1">
                                    <span class="step_no">1</span>
                                    <span class="step_descr">
                                        Paso 1
                                        <br />
                                        <small>Datos Personales</small>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2">
                                    <span class="step_no">2</span>
                                    <span class="step_descr">
                                        Paso 2 <br />
                                        <small>Encuesta</small>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3">
                                    <span class="step_no">3</span>
                                    <span class="step_descr">
                                        Paso 3<br />
                                        <small>Datos de Familiares</small>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div id="step-1">
                            {!! Form::open(['route' => 'vivientes.store', 'method' => 'POST','id'=>'encuestaVivienteForm']) !!}
                            <h2 class="StepTitle">Datos Personales</h2>
                            <br>
                            <div id="datosPersonales" data-parsley-validate class="form-horizontal form-label-left" style="width:100%" >
                                <div class="form-group">
                                    <label for="nombre" class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> 
                                        Nombre<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" maxlength="120" title="Si tienes más de uno, escríbelos todos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="apellidoPaterno" class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">
                                        Apellido Paterno<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="apellidoPaterno" name="apellidoPaterno" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="apellidoMaterno" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Apellido Materno<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="apellidoMaterno" name="apellidoMaterno" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="genero" class="control-label col-md-4 col-sm-4 col-xs-12">Genero</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="btn-group" data-toggle="buttons">
                                            <p>
                                                M:
                                                <input id="genero" type="radio" class="flat" name="genero" value="M" checked=""/> 
                                                F:
                                                <input id="genero" type="radio" class="flat" name="genero" value="F" />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fechaNacimiento" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Fecha de Nacimiento<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input id="fechaNacimiento" class="form-control flatpickr col-md-7 col-xs-12" required="required" type="date" title="Mes/Dia/Año" >
                                    </div>
                                    <!-- Flat DateTime Picker-->
                                    <script src="https://unpkg.com/flatpickr"></script>
                                    <script type="text/javascript">
                                        flatpickr(".flatpickr", {
                                            altInput: true,
                                            altFormat: "j, F, Y"
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="telefonoCel" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Celular<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="telefonoCel" name="telefonoCel" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefonoCasa" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Teléfono de Casa<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="telefonoCasa" name="telefonoCasa" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correo" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Correo<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="email" id="correo" name="correo" required="required" class="form-control col-md-7 col-xs-12" maxlength="200">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="genero" class="control-label col-md-4 col-sm-4 col-xs-12">Restricciones alimetarias</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="btn-group" data-toggle="buttons">
                                            <p>
                                                Ninguna:
                                                <input id="restriccionesAlimentarias" type="radio" class="flat" name="restriccionesAlimentarias" value="Ninguna" checked="" />
                                                Vegetariano:
                                                <input id="restriccionesAlimentarias" type="radio" class="flat" name="restriccionesAlimentarias" value="Vegetariano"/> 
                                                Vegano:
                                                <input id="restriccionesAlimentarias" type="radio" class="flat" name="restriccionesAlimentarias" value="Vegano" />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alergias" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Alergias
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="alergias" name="alergias" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="medioCampamento" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        ¿Cómo te enteraste del campamento?<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select id="medioCampamento" name="medioCampamento" class="form-control" required>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Anuncio">Anuncio/Poster</option>
                                            <option value="Stand Universitario">Stand Universitario</option>
                                            <option value="Miembro de Staff">Miembro de Staff</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="inputStaff">
                                    <label for="staff" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        ¿Quién?
                                    </label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <select id="staff" name="staff" class="form-control"  disabled>
                                            <script type="text/javascript">
                                            $( document ).ready(function() {
                                                $.get("https://campamentone.herokuapp.com/stafers/dropdown", 
                                                    function(data) {
                                                        var model = $('#staff');
                                                        var staff = jQuery.parseJSON(data);
                                                        $.each(staff, function(index, element) {
                                                            model.append("<option value='"+ element.id +"'>" + element.nombre + "</option>");
                                                            });
                                                        });
                                                });
                                            </script>
                                            <!-- Select 2-->
                                            <!-- Si es miembro de Staff-->
                                            <script>
                                                $("#medioCampamento").on('change',function(){
                                                    if($("#medioCampamento").val() == "Miembro de Staff"){
                                                        $("#staff").removeAttr('disabled');
                                                    }else{
                                                        $("#staff").attr('disabled', 'disabled');
                                                        $("#otroStaff").attr('disabled', 'disabled');
                                                    }
                                                });
                                                $("#staff").on('change',function(){
                                                    if($("#staff").val() == "Otro"){
                                                        $("#otroStaff").removeAttr('disabled');
                                                    }else{
                                                        $("#otroStaff").attr('disabled', 'disabled');
                                                    }
                                                });
                                            </script>
                                            <!-- /Si es miembro de Staff-->
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="inputStaff2">
                                    <label for="otroStaff" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Otro
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="otroStaff" name="otroStaff" class="form-control col-md-7 col-xs-12" maxlength="200" disabled>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div id="step-2">
                            <h2 class="StepTitle">Encuesta</h2>
                            <p>
                                Enumera del 1 al 5 las cualidades según describan tu personalidad, 1 siendo la que más te describe, 5 siendo la que menos te describe.
                                <br>
                                Asigna solamente un número de importancia a cada cualidad por cada grupo.
                            </p>
                            <div id="encuestaForma" data-parsley-validate class="form-horizontal form-label-left" style="width:100%">
                                <!-- Cualidades 1-->
                                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
                                    <h4>Cualidades 1</h4><p>(1 es mas importante y 5 es menos importante)</p>
                                    <table id="cualidadesTabla" class="table" border="0" cellpadding="5" cellspacing="0" style="width=100%;">
                                        <thead>
                                            <tr id="cualidadMasMenos">
                                                <td></td>
                                                <td id="cualidadMasMenos" style="width: 16%;">
                                                    <label> + </label>
                                                </td> 
                                                <td style="width: 16%;">

                                                </td> 
                                                <td style="width: 16%;">

                                                </td> 
                                                <td style="width: 16%;">

                                                </td>
                                                <td id="cualidadMasMenos" style="width: 16%;">
                                                    <label> - </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                </td>
                                                <td style="width: 16%;">
                                                    <label >1</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >2</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >3</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >4</label>
                                                </td>
                                                <td style="width: 16%;">
                                                    <label >5</label>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="radiogroup" aria-label="Reservado" >
                                                <td>Reservado</td>
                                                <td style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="reservado" value="1" id="reservado" role="radio" data-col="1" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="reservado" value="2" id="reservado" role="radio" data-col="2" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="reservado" value="3" id="reservado" role="radio" data-col="3" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="reservado" value="4" id="reservado" role="radio" data-col="4" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="reservado" value="5" id="reservado" role="radio" data-col="5" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                            <tr role="radiogroup" aria-label="Sabiduria" >
                                                <td>Sabiduria</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="sabiduria" value="1" id="sabiduria" role="radio" data-col="1" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="sabiduria" value="2" id="sabiduria" role="radio" data-col="2" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="sabiduria" value="3" id="sabiduria" role="radio" data-col="3" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="sabiduria" value="4" id="sabiduria" role="radio" data-col="4" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="sabiduria" value="5" id="sabiduria" role="radio" data-col="5" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                            <tr role="radiogroup" aria-label="Idealista" >
                                                <td>Idealista</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="idealista" value="1" id="idealista" role="radio" data-col="1" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="idealista" value="2" id="idealista" role="radio" data-col="2" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="idealista" value="3" id="idealista" role="radio" data-col="3" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="idealista" value="4" id="idealista" role="radio" data-col="4" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="idealista" value="5" id="idealista" role="radio" data-col="5" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                            <tr role="radiogroup" aria-label="Explosivo" >
                                                <td>Explosivo</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="explosivo" value="1" id="explosivo" role="radio" data-col="1" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="explosivo" value="2" id="explosivo" role="radio" data-col="2" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="explosivo" value="3" id="explosivo" role="radio" data-col="3" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="explosivo" value="4" id="explosivo" role="radio" data-col="4" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="explosivo" value="5" id="explosivo" role="radio" data-col="5" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr role="radiogroup" aria-label="Optimismo" >
                                                <td>Optimismo</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="optimismo" value="1" id="optimismo" role="radio" data-col="1" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="optimismo" value="2" id="optimismo" role="radio" data-col="2" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="optimismo" value="3" id="optimismo" role="radio" data-col="3" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="optimismo" value="4" id="optimismo" role="radio" data-col="4" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="optimismo" value="5" id="optimismo" role="radio" data-col="5" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /Cualidades 1-->
                                <!-- Cualidades 2-->
                                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
                                    <h4>Cualidades 2</h4><p>(1 es mas importante y 5 es menos importante)</p>
                                    <table id="cualidadesTabla" class="table" border="0" cellpadding="5" cellspacing="0">
                                        <thead>
                                            <tr id="cualidadMasMenos">
                                                <td></td>
                                                <td id="cualidadMasMenos" style="width: 16%;">
                                                    <label> + </label>
                                                </td> 
                                                <td style="width: 16%;">

                                                </td> 
                                                <td style="width: 16%;">

                                                </td> 
                                                <td style="width: 16%;">

                                                </td>
                                                <td id="cualidadMasMenos" style="width: 16%;">
                                                    <label> - </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> </td>
                                                <td style="width: 16%;">
                                                    <label >1</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >2</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >3</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >4</label>
                                                </td>
                                                <td style="width: 16%;">
                                                    <label >5</label>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="radiogroup" aria-label="Prudencia" >
                                                <td>Prudencia</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="prudencia" value="1" id="prudencia" role="radio" data-col="6" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="prudencia" value="2" id="prudencia" role="radio" data-col="7" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="prudencia" value="3" id="prudencia" role="radio" data-col="8" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="prudencia" value="4" id="prudencia" role="radio" data-col="9" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="prudencia" value="5" id="prudencia" role="radio" data-col="10" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                            <tr role="radiogroup" aria-label="Disciplina" >
                                                <td>Disciplina</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="disciplina" value="1" id="disciplina" role="radio" data-col="6" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="disciplina" value="2" id="disciplina" role="radio" data-col="7" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="disciplina" value="3" id="disciplina" role="radio" data-col="8" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="disciplina" value="4" id="disciplina" role="radio" data-col="9" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="disciplina" value="5" id="disciplina" role="radio" data-col="10" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                            <tr role="radiogroup" aria-label="Pasión" >
                                                <td>Pasión</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="pasion" value="1" id="pasion" role="radio" data-col="6" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="pasion" value="2" id="pasion" role="radio" data-col="7" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="pasion" value="3" id="pasion" role="radio" data-col="8" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="pasion" value="4" id="pasion" role="radio" data-col="9" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="pasion" value="5" id="pasion" role="radio" data-col="10" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                            <tr role="radiogroup" aria-label="Hipersensibilidad" >
                                                <td>Hipersensibilidad</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="hipersensibilidad" value="1" id="hipersensibilidad" role="radio" data-col="6" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="hipersensibilidad" value="2" id="hipersensibilidad" role="radio" data-col="7" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="hipersensibilidad" value="3" id="hipersensibilidad" role="radio" data-col="8" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="hipersensibilidad" value="4" id="hipersensibilidad" role="radio" data-col="9" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="hipersensibilidad" value="5" id="hipersensibilidad" role="radio" data-col="10" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr role="radiogroup" aria-label="Generosidad" >
                                                <td>Generosidad</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="generosidad" value="1" id="generosidad" role="radio" data-col="6" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="generosidad" value="2" id="generosidad" role="radio" data-col="7" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="generosidad" value="3" id="generosidad" role="radio" data-col="8" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="generosidad" value="4" id="generosidad" role="radio" data-col="9" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="generosidad" value="5" id="generosidad" role="radio" data-col="10" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /Cualidades 2-->
                                <!-- Cualidades 3-->
                                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
                                    <h4>Cualidades 3</h4><p>(1 es mas importante y 5 es menos importante)</p>
                                    <table id="cualidadesTabla" class="table" border="0" cellpadding="5" cellspacing="0">
                                        <thead>
                                            <tr id="cualidadMasMenos">
                                                <td></td>
                                                <td id="cualidadMasMenos" style="width: 16%;">
                                                    <label> + </label>
                                                </td> 
                                                <td style="width: 16%;">

                                                </td> 
                                                <td style="width: 16%;">

                                                </td> 
                                                <td style="width: 16%;">

                                                </td>
                                                <td id="cualidadMasMenos" style="width: 16%;">
                                                    <label> - </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> </td>
                                                <td style="width: 16%;">
                                                    <label >1</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >2</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >3</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >4</label>
                                                </td>
                                                <td style="width: 16%;">
                                                    <label >5</label>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="radiogroup" aria-label="Handy" >
                                                <td>Handy</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="handy" value="1" id="handy" role="radio" data-col="11" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="handy" value="2" id="handy" role="radio" data-col="12" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="handy" value="3" id="handy" role="radio" data-col="13" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="handy" value="4" id="handy" role="radio" data-col="14" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="handy" value="5" id="handy" role="radio" data-col="15" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                            <tr role="radiogroup" aria-label="Tesón" >
                                                <td>Tesón</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="teson" value="1" id="teson" role="radio" data-col="11" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="teson" value="2" id="teson" role="radio" data-col="12" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="teson" value="3" id="teson" role="radio" data-col="13" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="teson" value="4" id="teson" role="radio" data-col="14" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="teson" value="5" id="teson" role="radio" data-col="15" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                            <tr role="radiogroup" aria-label="Elocuente" >
                                                <td>Elocuente</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="elocuente" value="1" id="elocuente" role="radio" data-col="11" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="elocuente" value="2" id="elocuente" role="radio" data-col="12" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="elocuente" value="3" id="elocuente" role="radio" data-col="13" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="elocuente" value="4" id="elocuente" role="radio" data-col="14" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="elocuente" value="5" id="elocuente" role="radio" data-col="15" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                            <tr role="radiogroup" aria-label="Aventado" >
                                                <td>Aventado</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="aventado" value="1" id="aventado" role="radio" data-col="11" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="aventado" value="2" id="aventado" role="radio" data-col="12" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="aventado" value="3" id="aventado" role="radio" data-col="13" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="aventado" value="4" id="aventado" role="radio" data-col="14" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="aventado" value="5" id="aventado" role="radio" data-col="15" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                            <tr role="radiogroup" aria-label="Empatía" >
                                                <td>Empatía</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="empatia" value="1" id="empatia" role="radio" data-col="11" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="empatia" value="2" id="empatia" role="radio" data-col="12" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="empatia" value="3" id="empatia" role="radio" data-col="13" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="empatia" value="4" id="empatia" role="radio" data-col="14" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="empatia" value="5" id="empatia" role="radio" data-col="15" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /Cualidades 3-->
                                <!-- Cualidades 4-->
                                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
                                    <h4>Cualidades 4</h4><p>(1 es mas importante y 5 es menos importante)</p>
                                    <table id="cualidadesTabla" class="table" border="0" cellpadding="5" cellspacing="0">
                                        <thead>
                                            <tr id="cualidadMasMenos">
                                                <td></td>
                                                <td id="cualidadMasMenos" style="width: 16%;">
                                                    <label> + </label>
                                                </td> 
                                                <td style="width: 16%;">

                                                </td> 
                                                <td style="width: 16%;">

                                                </td> 
                                                <td style="width: 16%;">

                                                </td>
                                                <td id="cualidadMasMenos" style="width: 16%;">
                                                    <label> - </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> </td>
                                                <td style="width: 16%;">
                                                    <label >1</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >2</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >3</label>
                                                </td> 
                                                <td style="width: 16%;">
                                                    <label >4</label>
                                                </td>
                                                <td style="width: 16%;">
                                                    <label >5</label>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="radiogroup" aria-label="Misterioso" >
                                                <td>Misterioso</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="misterioso" value="1" id="misterioso" role="radio" data-col="16" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="misterioso" value="2" id="misterioso" role="radio" data-col="17" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="misterioso" value="3" id="misterioso" role="radio" data-col="18" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="misterioso" value="4" id="misterioso" role="radio" data-col="19" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="misterioso" value="5" id="misterioso" role="radio" data-col="20" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr role="radiogroup" aria-label="Fortaleza" >
                                                <td>Fortaleza</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="fortaleza" value="1" id="fortaleza" role="radio" data-col="16" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="fortaleza" value="2" id="fortaleza" role="radio" data-col="17" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="fortaleza" value="3" id="fortaleza" role="radio" data-col="18" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="fortaleza" value="4" id="fortaleza" role="radio" data-col="19" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="fortaleza" value="5" id="fortaleza" role="radio" data-col="20" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr role="radiogroup" aria-label="Capacidad de Improvisar" >
                                                <td>Capacidad de Improvisar</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="improvisar" value="1" id="improvisar" role="radio" data-col="16" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="improvisar" value="2" id="improvisar" role="radio" data-col="17" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="improvisar" value="3" id="improvisar" role="radio" data-col="18" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="improvisar" value="4" id="improvisar" role="radio" data-col="19" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="improvisar" value="5" id="improvisar" role="radio" data-col="20" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr role="radiogroup" aria-label="Afable (fácil de tratar)" >
                                                <td>Afable (fácil de tratar)</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="afable" value="1" id="afable" role="radio" data-col="16" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="afable" value="2" id="afable" role="radio" data-col="17" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="afable" value="3" id="afable" role="radio" data-col="18" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="afable" value="4" id="afable" role="radio" data-col="19" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="afable" value="5" id="afable" role="radio" data-col="20" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr role="radiogroup" aria-label="Lealtad" >
                                                <td>Lealtad</td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="lealtad" value="1" id="lealtad" role="radio" data-col="16" aria-label="1" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="lealtad" value="2" id="lealtad" role="radio" data-col="17" aria-label="2" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">

                                                    <div>
                                                        <input type="radio" name="lealtad" value="3" id="lealtad" role="radio" data-col="18" aria-label="3" required="" aria-required="true">
                                                    </div>

                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="lealtad" value="4" id="lealtad" role="radio" data-col="19" aria-label="4" required="" aria-required="true">
                                                    </div>
                                                </td>
                                                <td  style="width: 16%;">
                                                    <div>
                                                        <input type="radio" name="lealtad" value="5" id="lealtad" role="radio" data-col="20" aria-label="5" required="" aria-required="true">
                                                    </div>
                                                </td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /Cualidades 4-->
                                <!-- Cualidades 5-->
                                <div class="form-group">
                                    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2">
                                        <h4>Cualidades 5</h4><p>(1 es mas importante y 5 es menos importante)</p>
                                        <table id="cualidadesTabla" class="table" border="0" cellpadding="5" cellspacing="0">
                                            <thead>
                                                <tr id="cualidadMasMenos">
                                                    <td></td>
                                                    <td id="cualidadMasMenos" style="width: 16%;">
                                                        <label> + </label>
                                                    </td> 
                                                    <td style="width: 16%;">

                                                    </td> 
                                                    <td style="width: 16%;">

                                                    </td> 
                                                    <td style="width: 16%;">

                                                    </td>
                                                    <td id="cualidadMasMenos" style="width: 16%;">
                                                        <label> - </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> </td>
                                                    <td style="width: 16%;">
                                                        <label >1</label>
                                                    </td> 
                                                    <td style="width: 16%;">
                                                        <label >2</label>
                                                    </td> 
                                                    <td style="width: 16%;">
                                                        <label >3</label>
                                                    </td> 
                                                    <td style="width: 16%;">
                                                        <label >4</label>
                                                    </td>
                                                    <td style="width: 16%;">
                                                        <label >5</label>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="radiogroup" aria-label="Franco" >
                                                    <td>Franco</td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="franco" value="1" id="franco" role="radio" data-col="21" aria-label="1" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="franco" value="2" id="franco" role="radio" data-col="22" aria-label="2" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">

                                                        <div>
                                                            <input type="radio" name="franco" value="3" id="franco" role="radio" data-col="23" aria-label="3" required="" aria-required="true">
                                                        </div>

                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="franco" value="4" id="franco" role="radio" data-col="24" aria-label="4" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="franco" value="5" id="franco" role="radio" data-col="25" aria-label="5" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr role="radiogroup" aria-label="Sobreprotector" >
                                                    <td>Sobreprotector</td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="sobreprotector" value="1" id="sobreprotector" role="radio" data-col="21" aria-label="1" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="sobreprotector" value="2" id="sobreprotector" role="radio" data-col="22" aria-label="2" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">

                                                        <div>
                                                            <input type="radio" name="sobreprotector" value="3" id="sobreprotector" role="radio" data-col="23" aria-label="3" required="" aria-required="true">
                                                        </div>

                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="sobreprotector" value="4" id="sobreprotector" role="radio" data-col="24" aria-label="4" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="sobreprotector" value="5" id="sobreprotector" role="radio" data-col="25" aria-label="5" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr role="radiogroup" aria-label="Creativo" >
                                                    <td>Creativo</td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="creativo" value="1" id="creativo" role="radio" data-col="21" aria-label="1" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="creativo" value="2" id="creativo" role="radio" data-col="22" aria-label="2" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">

                                                        <div>
                                                            <input type="radio" name="creativo" value="3" id="creativo" role="radio" data-col="23" aria-label="3" required="" aria-required="true">
                                                        </div>

                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="creativo" value="4" id="creativo" role="radio" data-col="24" aria-label="4" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="creativo" value="5" id="creativo" role="radio" data-col="25" aria-label="5" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr role="radiogroup" aria-label="Movido" >
                                                    <td>Movido</td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="movido" value="1" id="movido" role="radio" data-col="21" aria-label="1" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="movido" value="2" id="movido" role="radio" data-col="22" aria-label="2" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">

                                                        <div>
                                                            <input type="radio" name="movido" value="3" id="movido" role="radio" data-col="23" aria-label="3" required="" aria-required="true">
                                                        </div>

                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="movido" value="4" id="movido" role="radio" data-col="24" aria-label="4" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="movido" value="5" id="movido" role="radio" data-col="25" aria-label="5" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr role="radiogroup" aria-label="Deseo de Triunfar" >
                                                    <td>Deseo de Triunfar</td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="triunfar" value="1" id="triunfar" role="radio" data-col="21" aria-label="1" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="triunfar" value="2" id="triunfar" role="radio" data-col="22" aria-label="2" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">

                                                        <div>
                                                            <input type="radio" name="triunfar" value="3" id="triunfar" role="radio" data-col="23" aria-label="3" required="" aria-required="true">
                                                        </div>

                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="triunfar" value="4" id="triunfar" role="radio" data-col="24" aria-label="4" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                    <td  style="width: 16%;">
                                                        <div>
                                                            <input type="radio" name="triunfar" value="5" id="triunfar" role="radio" data-col="25" aria-label="5" required="" aria-required="true">
                                                        </div>
                                                    </td>
                                                </tr> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /Cualidades 5-->
                                <div class="form-group">
                                    <label for="actitudAPersonalidad" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        ¿Cuál es la actitud que más se acerca a mi personalidad que se encuentra arriba?<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select id="actitudAPersonalidad" name="actitudAPersonalidad" class="select2_single form-control" tabindex="-1" required>
                                            <option value="Reservado">Reservado</option>
                                            <option value="Sabiduria">Sabiduria</option>
                                            <option value="Idealista">Idealista</option>
                                            <option value="Explosivo">Explosivo</option>
                                            <option value="Optimismo">Optimismo</option>
                                            <option value="Prudente">Prudente</option>
                                            <option value="Disciplina">Disciplina</option>
                                            <option value="Pasión">Pasión</option>
                                            <option value="Hipersensible">Hipersensible</option>
                                            <option value="Generosidad">Generosidad</option>
                                            <option value="Handy">Handy</option>
                                            <option value="Tesón">Tesón</option>
                                            <option value="Elocuente">Elocuente</option>
                                            <option value="Aventado">Aventado</option>
                                            <option value="Empatía">Empatía</option>
                                            <option value="Misterioso">Misterioso</option>
                                            <option value="Capacidad de Improvisar">Capacidad de Improvisar</option>
                                            <option value="Afable">Afable</option>
                                            <option value="Lealtad">Lealtad</option>
                                            <option value="Franco">Franco</option>
                                            <option value="Sobreprotector">Sobreprotector</option>
                                            <option value="Creativo">Creativo</option>
                                            <option value="Movido">Movido</option>
                                            <option value="Deseo de Triunfar">Deseo de Triunfar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="descripcionUnoMismo" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        ¿Cómo se describiría a si mismo?<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea id="descripcionUnoMismo" required="required" class="form-control" name="descripcionUnoMismo" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="400" data-parsley-minlength-message="Una breve descripción de tu forma de ser"
                                        data-parsley-validation-threshold="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cualidades" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Menciona 4 cualidades <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="cualidades" name="cualidades" required="required" class="form-control col-md-7 col-xs-12" maxlength="200">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="defectos" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Menciona 4 defectos <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="defectos" name="defectos" required="required" class="form-control col-md-7 col-xs-12" maxlength="200">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fiestaMeGusta" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        En una fiesta me gusta:<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="btn-group" data-toggle="buttons">
                                            <p>
                                                <input id="fiestaMeGusta" type="radio" class="flat" name="fiestaMeGusta" value="Ser el primero en llegar (la puntualidad ante todo)" checked=""/> 
                                                Ser el primero en llegar (la puntualidad ante todo)
                                                <br>
                                                <input id="fiestaMeGusta" type="radio" class="flat" name="fiestaMeGusta" value="Llegar a la fiesta a "x" hora sin hacer notar mi llegada" />
                                                Llegar a la fiesta a "x" hora sin hacer notar mi llegada
                                                <br>
                                                <input id="fiestaMeGusta" type="radio" class="flat" name="fiestaMeGusta" value="Llegar y saludar a todos inmediatamente y me la paso platicando con mucha gente todo el tiempo" />
                                                Llegar y saludar a todos inmediatamente y me la paso platicando con mucha gente todo el tiempo
                                                <br>
                                                <input id="fiestaMeGusta" type="radio" class="flat" name="fiestaMeGusta" value="Estar en un pequeño grupo conviviendo" />
                                                Estar en un pequeño grupo conviviendo
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                        <div id="step-3">
                            <h2 class="StepTitle">Datos Familiares y Amigos</h2>
                            <div id="datosFamiliar" data-parsley-validate class="form-horizontal form-label-left" style="width:100%" >
                                <br>
                                <h4>Padre</h4>
                                <div class="form-group">
                                    <label for="nombrePadre" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Nombre del Padre <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="nombrePadre" name="nombrePadre" required="required" class="form-control col-md-7 col-xs-12" title="Nombre Completo" maxlength="250">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefonoPadre" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Teléfono oficina del padre
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="telefonoPadre" name="telefonoPadre"  class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="celularPadre" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Teléfono celular del padre <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="celularPadre" name="celularPadre" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correoPadre" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Correo electrónico del padre <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="email" id="correoPadre" name="correoPadre" required="required" class="form-control col-md-7 col-xs-12" maxlength="200">
                                    </div>
                                </div>
                                <br>
                                <h4>Madre</h4>
                                <div class="form-group">
                                    <label for="nombreMadre" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Nombre de la madre  <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="nombreMadre" name="nombreMadre" required="required" class="form-control col-md-7 col-xs-12" title="Nombre Completo" maxlength="200">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefonoMadre" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Teléfono oficina de la madre
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="telefonoMadre" name="telefonoMadre" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="celularMadre" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Teléfono celular de la madre<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="celularMadre" name="celularMadre" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correoMadre" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Correo electrónico de la madre <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="email" id="correoMadre" name="correoMadre" required="required" class="form-control col-md-7 col-xs-12" maxlength="200">
                                    </div>
                                </div>
                                <br>
                                <h4>Amigo 1</h4>
                                <div class="form-group">
                                    <label for="nombreAmigo1" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Nombre amigo #1  <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="nombreAmigo1" name="nombreAmigo1" required="required" class="form-control col-md-7 col-xs-12" title="Nombre Completo" maxlength="200">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefonoAmigo1" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Teléfono de casa amigo #1
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="telefonoAmigo1" name="telefonoAmigo1" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="celularAmigo1" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Teléfono celular de amigo #1<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="celularAmigo1" name="celularAmigo1" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correoAmigo1" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Correo electrónico de amigo #1 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="email" id="correoAmigo1" name="correoAmigo1" required="required" class="form-control col-md-7 col-xs-12" maxlength="200">
                                    </div>
                                </div>
                                <br>
                                <h4>Amigo 2</h4>
                                <div class="form-group">
                                    <label for="nombreAmigo2" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Nombre amigo #2  <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="nombreAmigo2" name="nombreAmigo2" required="required" class="form-control col-md-7 col-xs-12" title="Nombre Completo" maxlength="200">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefonoAmigo2" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Teléfono de casa amigo #2
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="telefonoAmigo2" name="telefonoAmigo2" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="celularAmigo2" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Teléfono celular de amigo #2<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="celularAmigo2" name="celularAmigo2" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correoAmigo2" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Correo electrónico de amigo #2 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="email" id="correoAmigo2" name="correoAmigo2" required="required" class="form-control col-md-7 col-xs-12" maxlength="200">
                                    </div>
                                </div>
                                <h4>Amigo 3</h4>
                                <div class="form-group">
                                    <label for="nombreAmigo3" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Nombre amigo #3  <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="nombreAmigo3" name="nombreAmigo3" required="required" class="form-control col-md-7 col-xs-12" title="Nombre Completo" maxlength="200">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telefonoAmigo3" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Teléfono de casa amigo #3
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="telefonoAmigo3" name="telefonoAmigo3" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="celularAmigo3" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Teléfono celular de amigo #3<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="celularAmigo3" name="celularAmigo3" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correoAmigo3" class="control-label col-md-4 col-sm-4 col-xs-12">
                                        Correo electrónico de amigo #3 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="email" id="correoAmigo3" name="correoAmigo3" required="required" class="form-control col-md-7 col-xs-12" maxlength="200">
                                    </div>
                                </div>
                                <div class="alert alert-danger" role="alert" id="mensajeViviente" style="display: none;"></div>
                                <br>
                                <br>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <script type="text/javascript">
                    $( "#target" ).submit(function( event ) {
                      alert( "Handler for .submit() called." );
                      event.preventDefault();
                    });
                    </script>
                    
                </div>
                <!-- End SmartWizard Content -->
            </div>
        </div>
    </div>

    

</body>
</html>