@extends('layouts.app')

@section('styles')
	<!-- TimePicker-->
	<link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">

	<!-- Datatables -->
    <link href="/js/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/js/datatables/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/js/datatables/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/js/datatables/scroller.bootstrap.min.css" rel="stylesheet">
@stop

@section('content')
<div class="">
	<!-- Title -->
	<div class="row">
		<div class="page-title">
			<div class="title_left">
				<h3> Vivientes<small>informacion de Vivientes</small></h3>
			</div>
		</div>
	</div>
	<!--Vivientes Registrados-->
	<div class="row" id="viv">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Vivientes Registrados <small></small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<p class="text-muted font-13 m-b-30">
					</p>
					<table id="vivientes" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>Genero</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Edad</th>
								<th>Telefono</th>
								<th>Celular</th>
								<th>Correo</th>
								<th>Observaciones</th>
								<th>Restricciones Alimentarias</th>
								<th>Alergias</th>
								<th>Medio</th>
								<th>Staff</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="editarEliminarViviente"></div>
	</div>
	<br>

	<!--Vivientes Registrados Parciales-->
	<div class="row" id="vivientesParcial">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Vivientes Pagados Parciales <small></small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<p class="text-muted font-13 m-b-30">
					</p>
					<table id="vivientesParciales" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>Genero</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Edad</th>
								<th>Telefono</th>
								<th>Celular</th>
								<th>Correo</th>
								<th>Gaia</th>
								<th>Pagado</th>
								<th>Observaciones</th>
								<th>Restricciones Alimentarias</th>
								<th>Alergias</th>
								<th>Medio</th>
								<th>Staff</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="editarEliminarVivienteParcial"></div>
	</div>
	<br>

</div>

@stop

@section('scripts')

	<!-- Flat DateTime Picker-->
	<script src="https://unpkg.com/flatpickr"></script>
	<script type="text/javascript">
		flatpickr(".flatpickr", {
		    altInput: true,
    		altFormat: "j, F, Y"
		});
	</script>

	<!-- DATATABLES -->
    <script src="/js/datatables/jquery.dataTables.min.js"></script>
    <script src="/js/datatables/dataTables.bootstrap.js"></script>*
    <script src="/js/datatables/dataTables.buttons.min.js"></script>
    <script src="/js/datatables/buttons.bootstrap.min.js"></script>
    <script src="/js/datatables/buttons.flash.min.js"></script>*
    <script src="/js/datatables/buttons.html5.min.js"></script>
    <script src="/js/datatables/buttons.print.min.js"></script>
    <script src="/js/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="/js/datatables/dataTables.keyTable.min.js"></script>
    <script src="/js/datatables/dataTables.responsive.min.js"></script>
    <script src="/js/datatables/responsive.bootstrap.min.js"></script>*
    <script src="/js/datatables/datatables.scroller.min.js"></script>
    <script src="/js/datatables/jszip.min.js"></script>
    <script src="/js/datatables/pdfmake.min.js"></script>
    <script src="/js/datatables/vfs_fonts.js"></script>
    <!-- Viviente Registrado -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#vivientes").length) {
            $("#vivientes").DataTable({
              	dom: "Bfrtip",
              	keys: true,
              	ajax: {
			        url: "{{ url('/vivientes/vivientesRegistrados') }}",
			        dataSrc: ''
			    },
			  	columns: [{ data: 'id' },
			  		{ data: 'genero' },
			  		{ data: 'nombre' },
			  		{ data: 'apellido' },
			  		{ data: 'edad' },
			  		{ data: 'telefono' },
			  		{ data: 'celular' },
			  		{ data: 'correo' },
			  		{ data: 'observaciones' },
			  		{ data: 'restricciones' },
			  		{ data: 'alergias' },
			  		{ data: 'medio' },
			  		{ data: 'staff' }],
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true,
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        TableManageButtons.init();
      });
    </script>
    <script type="text/javascript">
	    $(document).ready(function() {
		    var table = $('#vivientes').DataTable();

		    $('#vivientes tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditViviente(data['id']);
		    } );
		} );
    </script>
    <!-- Viviente PagadoParcial -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#vivientes").length) {
            $("#vivientesParciales").DataTable({
              dom: "Bfrtip",
              keys: true,
              ajax: {
			        url: "{{ url('/vivientes/vivientesParciales') }}",
			        dataSrc: ''
			    },
			  columns: [{ data: 'id' },
			  			{ data: 'genero' },
			  			{ data: 'nombre' },
				        { data: 'apellido' },
				        { data: 'edad' },
				        { data: 'telefono' },
				        { data: 'celular' },
				        { data: 'correo' },
				        { data: 'gaia' },
				        { data: 'pagado' },
				        { data: 'observaciones' },
				        { data: 'restricciones' },
				        { data: 'alergias' },
				        { data: 'medio' },
				        { data: 'staff' }],
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true,
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        TableManageButtons.init();
      });
    </script>
    <script type="text/javascript">
	    $(document).ready(function() {
		    var table = $('#vivientesParciales').DataTable();

		    $('#vivientesParciales tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditVivienteParcial(data['id']);
		    } );
		} );
    </script>
    <!-- /DATATABLES -->

    <!-- Ajax para desplegar el editor de campamento -->
	<script type="text/javascript">
		function showEditViviente(obj){
			$.ajax({
		       url: "{{ url('/vivientes/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarViviente").empty();
		          	$("#editarEliminarViviente").append(html);
		          	flatpickr(".flatpickr", {
					    altInput: true,
			    		altFormat: "j, F, Y"
					});
		       },error: function(){
		       		$("#editarEliminarViviente").empty();
		       		$("#editarEliminarViviente").append("No se puede editar este elemento");
		       }
		    });
		}
	</script>

	<!-- Ajax para desplegar el viviente parcial -->
	<script type="text/javascript">
		function showEditVivienteParcial(obj){
			$.ajax({
		       url: "{{ url('/vivientes/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarVivienteParcial").empty();
		          	$("#editarEliminarVivienteParcial").append(html);
		          	flatpickr(".flatpickr", {
					    altInput: true,
			    		altFormat: "j, F, Y"
					});
		       },error: function(){
		       		$("#editarEliminarVivienteParcial").empty();
		       		$("#editarEliminarVivienteParcial").append("No se puede editar este elemento");
		       }
		    });
		}
	</script>

	<!-- Borrar-->
	<script>
		function borrar(obj) {
		    var r = confirm('Confirmar eliminacion de viviente');
		    if (r == true) {
		        window.location = $('#'+obj.id).data('route')
		    }
		}

		function cerrarViviente() {
			$("#editarEliminarViviente").empty();
			$("#editarEliminarVivienteParcial").empty();
		}
		function cerrarVivienteParcial() {
			$("#editarEliminarVivienteParcial").empty();
		}
		function cerrarPuesto() {
			$("#editarEliminarPuesto").empty();
		}
	</script>
@stop