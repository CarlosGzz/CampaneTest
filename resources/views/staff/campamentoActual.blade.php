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
				<h3> Staff<small>informacion de todo el Staff</small></h3>
			</div>
		</div>
	</div>
	<!--Vivientes Registrados-->
	<div class="row" id="tablaStaff">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Staff Registrados <small></small></h2>
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
					<table id="staff" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Gaia</th>
								<th>Rol</th>
								<th>Pagado</th>
								<th>Vehiculo</th>
								<th>Correo</th>
								<th>Telefono Cel</th>
								<th>Vivientes</th>
								<th>A Pagar</th>
								<th>Id</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="editarEliminarStaff"></div>
	</div>
	<br>
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
    <!-- Staff Registrado -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#staff").length) {
            $("#staff").DataTable({
              	dom: "Bfrtip",
              	keys: true,
              	ajax: {
			        url: "{{ url('/stafers/staffAsistentes') }}",
			        dataSrc: ''
			    },
			  	columns: [{ data: 'nombre' },
			  		{ data: 'apellido' },
			  		{ data: 'gaia' },
			  		{ data: 'puesto' },
			  		{ data: 'pagado' },
			  		{ data: 'vehiculo' },
			  		{ data: 'correo' },
			  		{ data: 'telefonoCel' },
			  		{ data: 'vivientes' },
			  		{ data: 'aPagar' },
			  		{ data: 'id' },],
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
		    var table = $('#staff').DataTable();

		    $('#staff tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditViviente(data['id']);
		    } );
		} );
    </script>
    <!-- /DATATABLES -->

    <!-- Ajax para desplegar el editor de campamento -->
	<script type="text/javascript">
		function showEditViviente(obj){
			$.ajax({
		       url: "{{ url('/stafers/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarStaff").empty();
		          	$("#editarEliminarStaff").append(html);
		          	flatpickr(".flatpickr", {
					    altInput: true,
			    		altFormat: "j, F, Y"
					});
		       },error: function(){
		       		$("#editarEliminarStaff").empty();
		       		$("#editarEliminarStaff").append("No se puede editar este elemento");
		       }
		    });
		}
	</script>

	<!-- Borrar-->
	<script>
		function borrar(obj) {
		    var r = confirm('Confirmar eliminacion de campamento');
		    if (r == true) {
		        window.location = $('#'+obj.id).data('route')
		    }
		}

		function cerrarStaff() {
			$("#editarEliminarStaff").empty();
		}
	</script>
@stop