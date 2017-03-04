
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
					pagados += data;
					vivientesPagadosParcialesAjax();
				}
			});
		}
		function vivientesPagadosParcialesAjax(){
			$.ajax({
				url: "{{ route('staffDashboard.vivientesPagadosParcialesContador')}}",
				dataType: 'json',
				success: function(data) {
					pagados += data;
					$("#vivientesPagadosParciales").empty();
					$("#vivientesPagadosParciales").html(data); 
					vacantesAjax();
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

	<!-- Ajax para staff Tiles -->
	<script type="text/javascript">
		var pagados=0;
		function staffPagadosAjax(){
			$.ajax({
				url: "{{ route('staffDashboard.staffPagadosContador')}}",
				dataType: 'json',
				success: function(data) {
					$("#staffPagados").empty();
					$("#staffPagados").html(data); 
					pagados = data;
				}
			});
		}
		function staffAsistentesAjax(){
			$.ajax({
				url: "{{ route('staffDashboard.staffAsistentesContador')}}",
				dataType: 'json',
				success: function(data) {
					$("#staffAsistentes").empty();
					$("#staffAsistentes").html(data);
				}
			});
		}
		function staffRegistradosAjax(){
			$.ajax({
				url: "{{ route('staffDashboard.staffRegistradosContador')}}",
				dataType: 'json',
				success: function(data) {
					$("#staffRegistrados").empty();
					$("#staffRegistrados").html(data);
				}
			});
		}
		function staffViejosNuevosAjax(){
			$.ajax({
				url: "{{ route('staffDashboard.viejosNuevos')}}",
				dataType: 'json',
				success: function(data) {
					$("#staffViejosNuevos").empty();
					$("#staffViejosNuevos").html(data.viejos+'/'+data.nuevos);
					var viejosnuevosPieData = [
					{
						value: data.viejos,
						color: "#070D0D"
					},
					{
						value: data.nuevos,
						color: "#2196f3"
					}
					];
					viejosnuevosPie.Pie(viejosnuevosPieData,{animation:false});
				}
			});
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
		var viejosnuevosPie = new Chart(document.getElementById("canvas3").getContext("2d"));
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

			staffRegistradosAjax();
			staffAsistentesAjax();
			staffPagadosAjax();
			staffViejosNuevosAjax();
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