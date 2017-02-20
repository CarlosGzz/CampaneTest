<!-- Flat DateTime Picker-->
	<script src="https://unpkg.com/flatpickr"></script>
	<script type="text/javascript">
		flatpickr(".flatpickr", {
		    altInput: true,
    		altFormat: "j, F, Y"
		});
	</script>

	<script type="text/javascript">
    $(document).ready(function(){
        $("#staffVivienteOtro").on('change',function(){       
            if($("#staffVivienteOtro").val() == "staff"){
                $("#viviente").attr('disabled', 'disabled');
                $("#otro").prop('disabled', true);
                $("#staff").removeAttr('disabled');
            }
            if($("#staffVivienteOtro").val() == "viviente"){
                $("#staff").attr('disabled', 'disabled');
                $("#otro").prop('disabled', true);
                $("#viviente").removeAttr('disabled');
            }
            if($("#staffVivienteOtro").val() == "otro"){
                $("#viviente").attr('disabled', 'disabled');
                $("#staff").attr('disabled', 'disabled');
                $("#otro").prop('disabled', false);
            }
        });
    });
	</script>

	<!-- Staff Dropdown -->
	<script type="text/javascript">
    	function staffDropdown() {
        	$.get("{{ route('staffDropdown')}}", 
            function(data) {
                var model = $('#staff');
                model.empty();
                var staff = jQuery.parseJSON(data);
                $.each(staff, function(index, element) {
                    model.append("<option value='"+ element.id +"'>" + element.nombre +"</option>");
                });
            });
        }
    </script>

    <!-- Staff Dropdown -->
	<script type="text/javascript">
    	function vivientesDropdown() {
        	$.get("{{ route('vivientesDropdown')}}", 
            function(data) {
                var model = $('#viviente');
                model.empty();
                var staff = jQuery.parseJSON(data);
                $.each(staff, function(index, element) {
                    model.append("<option value='"+ element.id +"'>" + element.nombre +"</option>");
                });
            });
        }
    </script>

    <!-- Select 2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script>
	    $(document).ready(function(){
	        $("#staffVivienteOtro").select2({
	          minimumResultsForSearch: 10
	      	});
	      	$("#staff").select2({
	          minimumResultsForSearch: 10
	      	});
	      	$("#viviente").select2({
	          minimumResultsForSearch: 10
	      	});
	        $("#metodoDePago").select2({
	        	minimumResultsForSearch: 10
	        });
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
    <!-- Ingresos -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#tablaIngresos").length) {
            $("#tablaIngresos").DataTable({
              	dom: "Bfrtip",
              	keys: true,
              	ajax: {
			        url: "{{ url('/finanzas/ingreso') }}",
			        dataSrc: ''
			    },
			  	columns: [
			  			{ data: 'fecha' },
			  			{ data: 'staffVivienteOtro' },
				        { data: 'nombrePersona' },
				        { data: 'metodoDePago' },
				        { data: 'monto' },
				        { data: 'comentarios' },
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
		    var table = $('#tablaIngresos').DataTable();

		    $('#tablaIngresos tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditIngreso(data['id']);
		    } );
		} );
    </script>
    
    <!-- Egresos -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#tablaEgresos").length) {
            $("#tablaEgresos").DataTable({
              dom: "Bfrtip",
              keys: true,
              ajax: {
			        url: "{{ url('/finanzas/egreso') }}",
			        dataSrc: ''
			    },
			  columns: [
			  			{ data: 'fecha' },
			  			{ data: 'area' },
				        { data: 'nombrePersona' },
				        { data: 'descripcion' },
				        { data: 'monto' },
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
		    var table = $('#tablaEgresos').DataTable();

		    $('#tablaEgresos tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditEgreso(data['id']);
		    } );
		} );
    </script>
    <!-- /DATATABLES -->

    <!-- Ajax para desplegar el Ingreso -->
	<script type="text/javascript">
		function showEditIngreso(obj){
			$.ajax({
		       url: "{{ url('/finanzas/ingreso/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarIngreso").empty();
		          	$("#editarEliminarIngreso").append(html);
		          	flatpickr(".flatpickr", {
					    altInput: true,
			    		altFormat: "j, F, Y"
					});
					staffDropdown();
					selects();
		       },error: function(){
		       		$("#editarEliminarIngreso").empty();
		       		$("#editarEliminarIngreso").append("No se puede editar este elemento");
		       }
		    });
		}
	</script>

	<!-- Ajax para desplegar el egreso-->
	<script type="text/javascript">
		function showEditEgreso(obj){
			$.ajax({
		       url: "{{ url('/viviente/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarEgreso").empty();
		          	$("#editarEliminarEgreso").append(html);
		          	flatpickr(".flatpickr", {
					    altInput: true,
			    		altFormat: "j, F, Y"
					});
					staffDropdown();
					selects();
		       },error: function(){
		       		$("#editarEliminarEgreso").empty();
		       		$("#editarEliminarEgreso").append("No se puede editar este elemento");
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
			$("#editarEliminarVivientePagado").empty();
		}
	</script>

	<!-- Ajax para Vivientes Tiles -->
	<script type="text/javascript">
		var pagados=0;
		function vivientesPagadosAjax(){
			$.ajax({
				url: "{{ route('staffDashboard.vivientesPagadosContador')}}",
				dataType: 'json',
				success: function(data) {
					$("#vivientesPagados").empty();
					$("#vivientesPagados").html(data); 
					pagados = data;
					$("#vacantes").empty();
					$("#vacantes").html(45-pagados);
				}
			});
		}
		function vivientesPagadosParcialesAjax(){
			$.ajax({
				url: "{{ route('staffDashboard.vivientesPagadosParcialesContador')}}",
				dataType: 'json',
				success: function(data) {
					$("#vivientesPagadosParciales").empty();
					$("#vivientesPagadosParciales").html(data); 
				}
			});
		}
		function vivientesRegistradosAjax(){
			$.ajax({
				url: "{{ route('staffDashboard.vivientesRegistradosContador')}}",
				dataType: 'json',
				success: function(data) {
					$("#vivientesRegistrados").empty();
					$("#vivientesRegistrados").html(data);
				}
			});
		}
		function vacantesAjax(){
			$("#vacantes").empty();
			$("#vacantes").html(45-pagados); 
		}
	</script>

	<!-- Cargar Pagina-->
	<script type="text/javascript">
		function cargarPagina (argument) {
			vivientesRegistradosAjax();
			vivientesPagadosAjax();
			vivientesPagadosParcialesAjax();
			staffDropdown()
			vivientesDropdown()
		}
	</script>
	<!-- Run Ajax on DOM -->
	<script type="text/javascript">
		$(document).ready(function(){
			cargarPagina();
			setInterval(function(){
				cargarPagina();
			}, 20000);
		});	
	</script>