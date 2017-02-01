@extends('layouts.public')
@section('metas')
    <meta name="description" content="Encuesta Staff Antiguo">
@endsection
@section('title')
    Encuesta Staff Antiguo Campamento Nueva Especie Password
@endsection
@section('content')
    <div class="container body">
        <div class="main_container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
                    <div class="page-title">
                        <h3 style="font-size:40px ;color: #9B9692; text-align: center;">
                            <img src="/images/logoNe.png" style="width:150px; height:auto;">
                            Staff Encuesta
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
                <div class="x_panel" >
                    <div class="alert alert-danger" role="alert" id="mensajeStaff" style="display: none;"></div>
                    <div class="x_content" id="contenido">
                        <br>
                        {!! Form::open(['route' => ['updateStaff', $staff->id], 'method' => 'PUT', 'class'=>'form-horizontal form-label-left', 'id'=>'staffForm','data-parsley-validate']) !!}
                            <div class="form-group">
                                <div class="control-label col-md-9 col-sm-9 col-xs-12">
                                    <div class="row">
                                        <h4>
                                            <b style='text-align: center;'>¡Hola Kemeniano! Revisa que tus datos sean los correctos</b>
                                        </h4>
                                    </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <!--Asistencia-->
                            <div class="form-group">
                                <div class="row">
                                {!! Form::label('asistente','Asistiré al Campamento Nueva Especie edición Primavera 2017',['class'=>'col-md-8 col-sm-8 col-xs-12']) !!}
                                </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="btn-group" data-toggle="buttons">
                                            
                                                Si: {{Form::radio('asistente', true ,'true' ,['class' => 'flat'])}}
                                                No: {{Form::radio('asistente', false ,'' ,['class' => 'flat'])}}
                                            
                                        </div>
                                    </div>
                                
                            </div>
                            <br>
                            <div class="clearfix"></div>
                            <!--Nombre-->
                            <div class="form-group">
                                {!! Form::label('name','Nombre*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('nombre',$staff->nombre,['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Victoria','maxlength' => '120', 'required']) !!}
                                </div>
                            </div>

                            <!--Apellido Paterno-->
                            <div class="form-group">
                                {!! Form::label('name','Apellido Paterno*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('apellidoPaterno',$staff->apellidoPaterno,['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Gonzalez','maxlength' => '120', 'required']) !!}
                                </div>
                            </div>

                            <!--Apellido Materno-->
                            <div class="form-group">
                                {!! Form::label('name','Apellido Materno*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('apellidoMaterno',$staff->apellidoMaterno,['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Martinez','maxlength' => '120', 'required']) !!}
                                </div>
                            </div>

                            <!--Genero-->
                            <div class="form-group">
                                {!! Form::label('genero','Genero*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="btn-group" data-toggle="buttons">
                                        <p>
                                            @if($staff->genero == 'M')
                                                M: {{Form::radio('genero', 'M','true' ,['class' => 'flat'])}}
                                                F: {{Form::radio('genero', 'F','' ,['class' => 'flat'])}}
                                            @else
                                                M: {{Form::radio('genero', 'M','' ,['class' => 'flat'])}}
                                                F: {{Form::radio('genero', 'F','true' ,['class' => 'flat'])}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!--Fecha Nacimiento-->
                            <div class="form-group">
                                {!! Form::label('fechaNacimiento','Fecha de Nacimiento*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::date('fechaNacimiento', $staff->fechaNacimiento, ['class'=>'flatpickr form-control','required']) !!}
                                </div>
                            </div>

                            <!--Carrera y Universidad-->
                            <div class="form-group">
                                {!! Form::label('name','Carrera y Universidad*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    {!! Form::text('carrera',$staff->carrera,['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Carrera','minlength' => '5','maxlength' => '120','title'=>'Por favor escribe el nombre completo de tu carrera', 'required']) !!}
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    {!! Form::text('universidad',$staff->universidad,['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Universidad','maxlength' => '120','title'=>'Por favor escribe las siglas de tu Universidad', 'required']) !!}
                                </div>
                            </div>

                            <!--Estatus Estudiante o Graduado-->
                            <div class="form-group">
                                {!! Form::label('estudianteGraduado','Estatus*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="btn-group" data-toggle="buttons">
                                        <p>
                                            @if($staff->estudianteGraduado == 'estudiante')
                                                Estudiante: {{Form::radio('estudianteGraduado', 'estudiante','true',['class' => 'flat'])}}
                                                Graduado: {{Form::radio('estudianteGraduado', 'graduado','',['class' => 'flat'])}}
                                            @else
                                                Estudiante: {{Form::radio('estudianteGraduado', 'estudiante','',['class' => 'flat'])}}
                                                Graduado: {{Form::radio('estudianteGraduado', 'graduado','true',['class' => 'flat'])}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!--Gaia-->
                            <div class="form-group">
                                {!! Form::label('name','Gaia*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::select('gaia_id', array('1' => 'Draco', '2' => 'Fénix', '3' => 'Lycan', '4' => 'Quimera', '5' => 'Unicornio'), $staff->gaia_id,['class'=>'form-control select', 'required']) !!}
                                </div>
                            </div>

                            <!--Rol-->
                            <div class="form-group">
                                {!! Form::label('rolDeseado','Rol Deseado*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::select('rolDeseado', array('front' => 'Front', 'back' => 'Back', 'Cocina' => 'Cocina', 'donde sea' => 'Donde se necesite'), $staff->rolDeseado,['class'=>'form-control select', 'required'])!!}
                                </div>
                            </div>
                            
                            <!--Pulsera-->
                            <div class="form-group">
                                {!! Form::label('pulsera','Pulsera*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::select('pulsera', array('ninguna' => 'Ninguna','verde' => 'Verde', 'blanca' => 'Blanca', 'roja' => 'Roja', 'plateada' => 'Plateada'), $staff->pulsera,['class'=>'form-control select', 'required'])!!}
                                </div>
                            </div>

                            <!--Correo-->
                            <div class="form-group">
                                {!! Form::label('correo','Correo*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::email('correo',$staff->correo,['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'staff@kemen.com','maxlength' => '120', 'required']) !!}
                                </div>
                            </div>

                            <!--Celular-->
                            <div class="form-group">
                                {!! Form::label('telefonoCel','Celular*',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('telefonoCel',$staff->telefonoCel,['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => '8117784890','maxlength' => '120', 'required']) !!}
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button id="submitStaff" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- bootstrap js -->
        <script src="/js/bootstrap.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="/js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="/js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="/js/icheck/icheck.min.js"></script>
        <!-- custom js -->
        <script src="/js/custom.js"></script>

        <!-- Parsley -->
        <script src="/js/parsley/parsley.min.js"></script>
        <script>
          $(document).ready(function() {
            $.listen('parsley:field:validate', function() {
              validateFront();
            });
            $('#staffForm .btn').on('click', function() {
              $('#staffForm').parsley().validate();
              validateFront();
            });
            var validateFront = function() {
              if (true === $('#staffForm').parsley().isValid()) {
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
        <!-- /Parsley -->


        <script type="text/javascript">
         $("#staffForm :input").tooltip({
     
            // place tooltip on the right edge
            position: "center right",
     
            // a little tweaking of the position
            offset: [-2, 10],
     
            // use the built-in fadeIn/fadeOut effect
            effect: "fade",
     
            // custom opacity setting
            opacity: 0.7
     
          });
        </script>
        <!-- Flat DateTime Picker-->
        <script src="https://unpkg.com/flatpickr"></script>
        <script type="text/javascript">
            flatpickr(".flatpickr", {
                altInput: true,
                altFormat: "j, F, Y"
            });
        </script>

        <!-- Select 2-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script type="text/javascript">
            $('select').select2({
              minimumResultsForSearch: Infinity
            });
        </script>


    </body>
@endsection