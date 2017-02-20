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
			        url: "{{ url('/staff/staffAsistentes') }}",
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


	<!-- Ajax para Gaias Tiles -->
	<script type="text/javascript">
		function gaias(){
			$.ajax({
				url: "{{ route('staff.gaiasRegistrados')}}",
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
	<!-- Cargar Pagina-->
	<script type="text/javascript">
		function cargarPagina (argument) {
			gaias();
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