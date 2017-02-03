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
    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')
<div class="">
	<!-- Title -->
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			@include('vivientes.vivientesTiles')
		</div>
	</div>
	<!--Vivientes Registrados-->
	<div class="row" id="tablaVivientes">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Vivientes Registrados <small></small></h2>
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
					<table id="vivientes" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Genero</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Edad</th>
								<th>Telefono</th>
								<th>Celular</th>
								<th>Correo</th>
								<th>Observaciones</th>
								<th>Medio</th>
								<th>Staff</th>
								<th>Id</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="editarEliminarViviente"></div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			@include('gaias.gaiasVivientesTiles')
		</div>
	</div>
	<!--Vivientes Registrados Parciales-->
	<div class="row" id="tablaVivientesParcial">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Vivientes Pagados Parciales <small></small></h2>
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
					<table id="vivientesParciales" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Genero</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Edad</th>
								<th>Telefono</th>
								<th>Celular</th>
								<th>Correo</th>
								<th>Gaia</th>
								<th>Pagado</th>
								<th>Observaciones</th>
								<th>Restricciones Alimentarias</th>
								<th>Alergias</th>
								<th>Medio</th>
								<th>Staff</th>
								<th>Id</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="editarEliminarVivienteParcial"></div>
	</div>
	<br>
	<!--Vivientes Registrados Pagados-->
	<div class="row" id="tablaVivientesPagado">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Vivientes Pagados <small></small></h2>
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
					<table id="vivientesPagadosTabla" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Genero</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Edad</th>
								<th>Telefono</th>
								<th>Celular</th>
								<th>Correo</th>
								<th>Gaia</th>
								<th>Pagado</th>
								<th>Observaciones</th>
								<th>Restricciones Alimentarias</th>
								<th>Alergias</th>
								<th>Medio</th>
								<th>Staff</th>
								<th>Id</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="editarEliminarVivientePagado"></div>
	</div>
	<br>
	<!--Graficas vivientes pagados-->
	<div class="row">
	    <div class="page-title">
	        <div class="title_left">
	            <h3> Graficas de Vivientes Pagados <small></small></h3>
	        </div>
	    </div>
	</div>
	<br>
	@include('vivientes.vivientesCharts')

	<!--Fast Insights Vivientes-->
	<div class="row">
	    <div class="page-title">
	        <div class="title_left">
	            <h3> Graficas de Vivientes <small></small></h3>
	        </div>
	    </div>
	</div>
	<br>
	@include('vivientes.vivientesChartsStaffDashboard')
	

</div>

@stop

@section('scripts')
	@include('vivientes.vivientesDashboardJavascripts')
@stop