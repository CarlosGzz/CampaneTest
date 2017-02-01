<!-- bootstrap js -->
<script src="/js/bootstrap.min.js"></script>
<!-- custom js -->
<script src="/js/custom.js"></script>
<!-- bootstrap progress js -->
<script src="/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="/js/nicescroll/jquery.nicescroll.min.js"></script>

<!-- icheck -->
<script src="/js/icheck/icheck.min.js"></script>
<!-- /icheck -->

<!-- Select2 -->
<script src="/js/select/select2.full.js"></script>
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
        $("#medioCampamento").select2({
        });
    });
</script>
<!-- /Select2 -->
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

<!-- Ajax alta viviente--> 
<script type="text/javascript">
    function submit(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if($('#datosFamiliar').parsley().isValid() == true){
            $('#datosFamiliar').parsley().validate();
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
                    url: "{{ url('vivientesEncuestaSend')}}",
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
                    }
                });
            }
            return false;
        }else{
            $('#datosFamiliar').parsley().validate();
            $('#wizard').smartWizard('fixHeight','none');
        }
    };
</script>
<!-- /Ajax alta viviente--> 

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
            // validate step 2
            if(step == 2){
                if($('#encuestaForma').parsley().isValid() == false){
                    $('#encuestaForma').parsley().validate();
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

<!-- Dropdown de staff-->
<script type="text/javascript">
    $( document ).ready(function() {
        $.get("{{ route('staffDropdown')}}", 
            function(data) {
                var model = $('#staff');
                var staff = jQuery.parseJSON(data);
                $.each(staff, function(index, element) {
                    model.append("<option value='"+ element.id +"'>" + element.nombre + "</option>");
                });
            });
    });
</script>
<!-- /Dropdown de staff-->