@extends('layouts.public')
@section('metas')
    <meta name="description" content="Encuesta Staff Password">
@endsection
@section('title')
    Encuesta Staff Campamento Nueva Especie
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
                            <div class="row"></div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h3>Es mi primera vez como Staff</h3>
                                    <p>Da click aqui</p>
                                    <hr>
                                    <a href="{{ url('/encuestaStaffNuevo') }}" type="button" class="btn btn-primary">Aceptar</a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h3>Ya he sido Staff</h3>
                                    {!! Form::open(['route' => 'encuestaStaffViejo', 'method' => 'POST', 'class'=>'form-vertical']) !!}
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
                                        {!! Form::submit('Aceptar',['class'=>'btn btn-primary'])!!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
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
        $.get("{{ route('staffDropdown')}}", 
            function(data) {
                var model = $('#staffViejo');
                model.empty();
                var staff = jQuery.parseJSON(data);
                $.each(staff, function(index, element) {
                    model.append("<option value='"+ element.id +"'>" + element.nombre +"</option>");
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
        /*$('#staffViejo').on("select2:closing", function(e) {
           var id = $('#staffViejo').select2('val');
           console.log(id);
           $('#viejoSubmit').attr("href", "{{url('/staff')}}/"+id+"/edit")

        });*/
    </script>

@endsection