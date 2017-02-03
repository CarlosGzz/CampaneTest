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
              	responsive: true,
              	ajax: {
			        url: "{{ url('/staff/staffRegistrados') }}",
			        dataSrc: ''
			    },
			  	columns: [{ data: 'id' },
			  		{ data: 'nombre' },
			  		{ data: 'apellido' },
			  		{ data: 'genero' },
			  		{ data: 'edad' },
			  		{ data: 'correo' },
			  		{ data: 'celular' },
			  		{ data: 'gaia' },
			  		{ data: 'rolDeseado' },
			  		{ data: 'pulsera' },
			  		{ data: 'carrera' },
			  		{ data: 'universidad' },
			  		{ data: 'estudianteGraduado' },
			  		{ data: 'activo' }],
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
              	fnRowCallback: function( nRow, aData ) {
              		var id = aData['activo'];
					var $nRow = $(nRow);
					if (id == "1") { 
						$('td:eq(13)', nRow).html( 'Si' );
					}else{
						$nRow.css({"background-color":"#FFCDD2"})
						$('td:eq(13)', nRow).html( 'No' );
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
		       url: "{{ url('/staff/edit') }}"+"/"+obj,
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
		    var r = confirm('Confirmar eliminacion de staff');
		    if (r == true) {
		        window.location = $('#'+obj.id).data('route')
		    }
		}

		function cerrarStaff() {
			$("#editarEliminarStaff").empty();
		}
	</script>
	<!-- Ajax para Gaias Tiles -->
	<script type="text/javascript">
		function gaias(){
			$.ajax({
				url: "{{ route('staff.gaias')}}",
				dataType: 'json',
				success: function(data) {
					$("#draco").empty();
					$("#draco").html(data['draco']);

					$("#quimera").empty();
					$("#quimera").html(data['quimera']);

					$("#lycan").empty();
					$("#lycan").html(data['lycan']);

					$("#unicornio").empty();
					$("#unicornio").html(data['unicornio']);

					$("#fenix").empty();
					$("#fenix").html(data['fenix']);
				}
			});
		}
	</script>

	<!-- Ajax para staff Tiles -->
	<script type="text/javascript">
		function staffTiles(){
			$.ajax({
				url: "{{ route('staff.staffTiles')}}",
				dataType: 'json',
				success: function(data) {
					$("#total").empty();
					$("#total").html(data['total']);

					$("#activos").empty();
					$("#activos").html(data['activo']);

					$("#inactivos").empty();
					$("#inactivos").html(data['inactivo']);

					$("#registrados").empty();
					$("#registrados").html(data['registrados']);
				}
			});
		}
	</script>
	<!-- Cargar Pagina-->
	<script type="text/javascript">
		function cargarPagina (argument) {
			gaias();
			staffTiles();
		}
	</script>
	<!-- Run Ajax on DOM -->
	<script type="text/javascript">
		$(document).ready(function(){
			cargarPagina();
			setInterval(function(){
				cargarPagina();
			}, 50000);
		});	
	</script>