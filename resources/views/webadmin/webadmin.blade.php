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
	<div class="row">
		<div class="page-title">
			<div class="title_left">
				<h3> Web Admin Panel <small></small></h3>
			</div>
			<!--Datatable Campamentos-->

			<div class="row" id="tablaCampamentos">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Tabla de Campamentos <small></small></h2>
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
							<table id="campamentos" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>id</th>
										<th>Nombre</th>
										<th>Fecha Inicio</th>
										<th>Fecha Final</th>
										<th>Actual</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div id="editarEliminar"></div>
			@include('campamento/altaCampamento')
		</div>
		<br>
		<div class="row" id="tablaGaias">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Tabla de Gaia <small></small></h2>
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
							<table id="gaias" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>id</th>
										<th>Gaia</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div id="editarEliminarGaia"></div>
			@include('campamento/altaGaia')
		</div>
	</div>
</div>
@endsection

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
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#campamentos").length) {
            $("#campamentos").DataTable({
              dom: "Bfrtip",
              keys: true,
              ajax: {
			        url: "{{ url('/campamento') }}",
			        dataSrc: ''
			    },
			  columns: [{ data: 'id' },
			  			{ data: 'nombre' },
				        { data: 'fechaInicio' },
				        { data: 'fechaFinal' },
				        { data: 'actual' }],
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
              		var id = aData['actual'];
					var $nRow = $(nRow);
					if (id == "1") { 
						$nRow.css({"background-color":"#00FFFF"})
						$('td:eq(4)', nRow).html( 'Si' );
					}else{
						$('td:eq(4)', nRow).html( 'No' );
					}
					return nRow
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
	    var table = $('#campamentos').DataTable();

	    $('#campamentos tbody').on('click', 'tr', function () {
	        var data = table.row( this ).data();
	        showPanelOnTable(data['id']);
	    } );
	} );
    </script>
    <!-- /DATATABLES -->

    <!-- Ajax para desplegar el editor de campamento -->
	<script type="text/javascript">
		function showPanelOnTable(obj){
			$.ajax({
		       url: "{{ url('/campamento/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminar").empty();
		          	$("#editarEliminar").append(html);
		          	flatpickr(".flatpickr", {
					    altInput: true,
			    		altFormat: "j, F, Y"
					});
		       },error: function(){
		       		$("#editarEliminar").empty();
		       		$("#editarEliminar").append("No se puede editar este elemento");
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

		function cerrar() {
			$("#editarEliminar").empty();
		}
	</script>
@stop