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
          if ($("#vivientesPagadosTabla").length) {
            $("#vivientesPagadosTabla").DataTable({
              dom: "Bfrtip",
              keys: true,
              ajax: {
			        url: "{{ url('/vivientes/vivientesPagados') }}",
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
		    var table = $('#vivientesPagadosTabla').DataTable();

		    $('#vivientesPagadosTabla tbody').on('click', 'tr', function () {
		        var data = table.row( this ).data();
		        showEditVivientePagado(data['id']);
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

	<!-- Ajax para desplegar el viviente Pagado -->
	<script type="text/javascript">
		function showEditVivientePagado(obj){
			$.ajax({
		       url: "{{ url('/viviente/edit') }}"+"/"+obj,
		       success: function(html) {
		       		$("#editarEliminarVivientePagado").empty();
		          	$("#editarEliminarVivientePagado").append(html);
		          	flatpickr(".flatpickr", {
					    altInput: true,
			    		altFormat: "j, F, Y"
					});
					staffDropdown();
					selects();
		       },error: function(){
		       		$("#editarEliminarVivientePagado").empty();
		       		$("#editarEliminarVivientePagado").append("No se puede editar este elemento");
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
	          minimumResultsForSearch: 10
	      });
	        $("#medioCampamento").select2({
	        	minimumResultsForSearch: 10
	        });
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

	<!-- Ajax para Gaias Tiles -->
	<script type="text/javascript">
		function gaias(){
			$.ajax({
				url: "{{ route('vivientes.gaias')}}",
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

					$("#sinGaia").empty();
					$("#sinGaia").html(data['sinGaia']);
				}
			});
		}
	</script>

	<!-- chart js -->
	<script src="/js/chartjs/chart.min.js"></script>
	<!-- Script para llenar la informacion de las ChartJS -->
	<script>
		var edadesDoughnutData;
		var hombresMujeresPieData;
		var edadesDoughnut = new Chart(document.getElementById("canvas1").getContext("2d"));
		var hombresMujeresPie = new Chart(document.getElementById("canvas2").getContext("2d"));
		function edadesChart(){
			$.ajax({
				url: "{{ route('staffDashboard.edadesChartData')}}",
				dataType: 'json',
				success: function(data) {
					$("#intervalo1").empty();
					$("#intervalo1").html(data.intervalo1);

					$("#intervalo2").empty();
					$("#intervalo2").html(data.intervalo2);

					$("#intervalo3").empty();
					$("#intervalo3").html(data.intervalo3);

					$("#intervalo4").empty();
					$("#intervalo4").html(data.intervalo4);

					$("#intervalo5").empty();
					$("#intervalo5").html(data.intervalo5);

					$("#mayores").empty();
					$("#mayores").html(data.mayores);

					$("#canvas1").empty();
					edadesDoughnutData = [
					{
						value: parseInt(data.intervalo1),
						color: "#070D0D"
					},
					{
						value: parseInt(data.intervalo2),
						color: "#3498DB"
					},
					{
						value: parseInt(data.intervalo3),
						color: "#1ABB9C"
					},
					{
						value: parseInt(data.intervalo4),
						color: "#9B59B6"
					},
					{
						value: parseInt(data.intervalo5),
						color: "#9CC2CB"
					},
					{
						value: parseInt(data.mayores),
						color: "#E74C3C"
					}
					];
					edadesDoughnut.Doughnut(edadesDoughnutData,{animation:false});
				}
			});
		}
		function generoChart(){
			$.ajax({
				url: "{{ route('staffDashboard.generoChartData')}}",
				dataType: 'json',
				success: function(data) {
					$("#canvas2").empty();
					$("#hombres").empty();
					$("#hombres").html(data.hombres);
					$("#mujeres").empty();
					$("#mujeres").html(data.mujeres);
					hombresMujeresPieData = [
					{
						value: parseInt(data.hombres),
						color: "#3498Db"
					},
					{
						value: parseInt(data.mujeres),
						color: "#E74C3C"
					}
					];
					hombresMujeresPie.Pie(hombresMujeresPieData,{animation:false});
				}
			});
		}
	</script>

	<!-- Script para llenar la informacion de las ChartJS -->
	<script>
		var edadesDoughnutDataPagados;
		var hombresMujeresPieDataPagados;
		var vegetarianosVeganosPieData;
		var edadesDoughnutPagados = new Chart(document.getElementById("canvas3").getContext("2d"));
		var hombresMujeresPiePagados = new Chart(document.getElementById("canvas4").getContext("2d"));
		var vegetarianosVeganosPie = new Chart(document.getElementById("canvas5").getContext("2d"));
		function edadesChartPagados(){
			$.ajax({
				url: "{{ route('vivientes.edadesChartDataPagados')}}",
				dataType: 'json',
				success: function(data) {
					$("#intervalo1Pagado").empty();
					$("#intervalo1Pagado").html(data.intervalo1);

					$("#intervalo2Pagado").empty();
					$("#intervalo2Pagado").html(data.intervalo2);

					$("#intervalo3Pagado").empty();
					$("#intervalo3Pagado").html(data.intervalo3);

					$("#intervalo4Pagado").empty();
					$("#intervalo4Pagado").html(data.intervalo4);

					$("#intervalo5Pagado").empty();
					$("#intervalo5Pagado").html(data.intervalo5);

					$("#mayoresPagado").empty();
					$("#mayoresPagado").html(data.mayores);

					$("#canvas3").empty();
					edadesDoughnutDataPagados = [
					{
						value: parseInt(data.intervalo1),
						color: "#070D0D"
					},
					{
						value: parseInt(data.intervalo2),
						color: "#3498DB"
					},
					{
						value: parseInt(data.intervalo3),
						color: "#1ABB9C"
					},
					{
						value: parseInt(data.intervalo4),
						color: "#9B59B6"
					},
					{
						value: parseInt(data.intervalo5),
						color: "#9CC2CB"
					},
					{
						value: parseInt(data.mayores),
						color: "#E74C3C"
					}
					];
					edadesDoughnutPagados.Doughnut(edadesDoughnutDataPagados,{animation:false});
				}
			});
		}
		function generoChartPagados(){
			$.ajax({
				url: "{{ route('vivientes.generoChartDataPagados')}}",
				dataType: 'json',
				success: function(data) {
					$("#canvas4").empty();
					$("#hombresPagado").empty();
					$("#hombresPagado").html(data.hombres);
					$("#mujeresPagado").empty();
					$("#mujeresPagado").html(data.mujeres);
					hombresMujeresPieDataPagados = [
					{
						value: parseInt(data.hombres),
						color: "#3498Db"
					},
					{
						value: parseInt(data.mujeres),
						color: "#E74C3C"
					}
					];
					hombresMujeresPiePagados.Pie(hombresMujeresPieDataPagados,{animation:false});
				}
			});
		}

		function vegetarianosVeganos(){
			$.ajax({
				url: "{{ route('vivientes.vegetarianosVeganos')}}",
				dataType: 'json',
				success: function(data) {
					$("#canvas5").empty();
					$("#vegetarianos").empty();
					$("#vegetarianos").html(data.vegetarianos);
					$("#veganos").empty();
					$("#veganos").html(data.veganos);
					vegetarianosVeganosPieData = [
					{
						value: parseInt(data.vegetarianos),
						color: "#1ABB9C"
					},
					{
						value: parseInt(data.veganos),
						color: "#9CC2CB"
					}
					];
					vegetarianosVeganosPie.Pie(vegetarianosVeganosPieData,{animation:false});
				}
			});
		}
	</script>

	<!-- Cargar Pagina-->
	<script type="text/javascript">
		function cargarPagina (argument) {
			edadesChart();
			generoChart();
			edadesChartPagados();
			generoChartPagados();
			vegetarianosVeganos();
			vivientesRegistradosAjax();
			vivientesPagadosAjax();
			vivientesPagadosParcialesAjax();
			gaias();
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