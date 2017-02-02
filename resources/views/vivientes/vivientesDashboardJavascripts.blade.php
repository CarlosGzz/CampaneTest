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
			  	columns: [
			  		{ data: 'genero' },
			  		{ data: 'nombre' },
			  		{ data: 'apellido' },
			  		{ data: 'edad' },
			  		{ data: 'telefono' },
			  		{ data: 'celular' },
			  		{ data: 'correo' },
			  		{ data: 'observaciones' },
			  		{ data: 'medio' },
			  		{ data: 'staff' },
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
          if ($("#vivientesParciales").length) {
            $("#vivientesParciales").DataTable({
              dom: "Bfrtip",
              keys: true,
              ajax: {
			        url: "{{ url('/vivientes/vivientesParciales') }}",
			        dataSrc: ''
			    },
			  columns: [
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
				        { data: 'staff' },
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
		    var table = $('#vivientesParciales').DataTable();

		    $('#vivientesParciales tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditVivienteParcial(data['id']);
		    } );
		} );
    </script>
    <!-- Viviente Pagado -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#vivientesPagado").length) {
            $("#vivientesPagado").DataTable({
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
		       url: "{{ url('/viviente/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarViviente").empty();
		          	$("#editarEliminarViviente").append(html);
		          	flatpickr(".flatpickr", {
					    altInput: true,
			    		altFormat: "j, F, Y"
					});
					staffDropdown();
					selects();
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
		       url: "{{ url('/viviente/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarVivienteParcial").empty();
		          	$("#editarEliminarVivienteParcial").append(html);
		          	flatpickr(".flatpickr", {
					    altInput: true,
			    		altFormat: "j, F, Y"
					});
					staffDropdown();
					selects();
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

	<!-- Staff Dropdown -->
	<script type="text/javascript">
    function staffDropdown() {
        $.get("{{ route('staffDropdown')}}", 
            function(data) {
                var model = $('#staffViejo');
                model.empty();
                model.append("<option value='Otro'>Otro</option>");
                var staff = jQuery.parseJSON(data);
                $.each(staff, function(index, element) {
                    model.append("<option value='"+ element.id +"'>" + element.nombre +"</option>");
                    });
                });
        }
    </script>


	<!-- Select2 -->
	<script src="/js/select/select2.full.js"></script>
	<script>
	    function selects() {
	        $("#staffViejo").select2({
	          placeholder: "Selecciona un Miembro",
	          allowClear: true,
	          minimumResultsForSearch: 10
	      });
	        $("#medioCampamento").select2({
	        	minimumResultsForSearch: 10
	        });
	    }
	</script>¡