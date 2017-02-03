<!-- Bootstrap -->
<script src="/js/bootstrap.min.js"></script>
<!-- chart js -->
<script src="/js/chartjs/chart.min.js"></script>
<!-- bootstrap progress js -->
<script src="/js/nicescroll/jquery.nicescroll.min.js"></script>
<!--Custom js-->
<script src="/js/custom.js"></script>

<!-- Countdown js -->
<script src="/js/countdown/jquery.countdown.js"></script>
<script type="text/javascript">
	$('#countdown').countdown('2017/04/21', function(event) {
		$(this).html(event.strftime('<h1 style="text-align: center;"> %w Semanas %d Dias %H:%M:%S Horas </h1>'));
	});
</script>
<!-- /Countdown js -->

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
<!-- Run Ajax on DOM -->
<script type="text/javascript">
	$(document).ready(function(){
		cargarPagina();
		setInterval(function(){
			cargarPagina();
		}, 20000);
	});	
</script>
<script type="text/javascript">
	function cargarPagina (argument) {
		edadesChart();
		generoChart();
		staffViejosNuevosAjax();
		vivientesRegistradosAjax();
		vivientesPagadosAjax();

		staffRegistradosAjax();
		staffAsistentesAjax();
		staffPagadosAjax();
	}
</script>