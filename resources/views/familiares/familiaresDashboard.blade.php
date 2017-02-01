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
				<h3> Familiares<small> informacion de familiares de vivientes</small></h3>
			</div>
		</div>
	</div>

	<!--Vivientes Registrados Parciales-->
	<div class="row" id="tablaFamiliares">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Familiares de Vivientes<small></small></h2>
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
					<table id="familiares" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>id</th>
								<th>Viviente</th>
								<th>Nombre de Familiar</th>
								<th>Relacion</th>
								<th>Telefono</th>
								<th>Celular</th>
								<th>Correo</th>
								<th>Es Viviente</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="editarEliminarFamiliar"></div>
	</div>
	<br>

</div>

@stop

@section('scripts')

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
          if ($("#familiares").length) {
            $("#familiares").DataTable({
              	dom: "Bfrtip",
              	keys: true,
              	ajax: {
			        url: "{{ url('/familiares') }}",
			        dataSrc: ''
			    },
			  	columns: [
			  		{ data: 'id' },
			  		{ data: 'viviente' },
			  		{ data: 'nombre' },
			  		{ data: 'tipoFamiliar' },
			  		{ data: 'telefono' },
			  		{ data: 'celular' },
			  		{ data: 'correo' },
			  		{ data: 'esViviente' },
			  		],
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
              fnRowCallback: function( nRow, aData ) {
              		var id = aData['esViviente'];
					var $nRow = $(nRow);
					if (id == "1") { 
						$nRow.css({"background-color":"#FF0000"})
						$('td:eq(7)', nRow).html( 'Si' );
					}else{
						$('td:eq(7)', nRow).html( 'No' );
					}
				}
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
		    var table = $('#familiares').DataTable();

		    $('#familiares tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditFamiliar(data['id']);
		    } );
		} );
    </script>
    <!-- /DATATABLES -->

    <!-- Ajax para desplegar el editor de campamento -->
	<script type="text/javascript">
		function showEditFamiliar(obj){
			$.ajax({
		       url: "{{ url('/familiares/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarFamiliar").empty();
		          	$("#editarEliminarFamiliar").append(html);
		       },error: function(){
		       		$("#editarEliminarFamiliar").empty();
		       		$("#editarEliminarFamiliar").append("No se puede editar este elemento");
		       }
		    });
		}
	</script>

	<!-- Borrar-->
	<script>
		function borrar(obj) {
		    var r = confirm('Confirmar eliminacion de familiar');
		    if (r == true) {
		        window.location = $('#'+obj.id).data('route')
		    }
		}

		function cerrarFamiliar() {
			$("#editarEliminarFamiliar").empty();
		}
	</script>
@stop