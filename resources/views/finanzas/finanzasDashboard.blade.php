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
		<div class="page-title">
			<div class="title_left">
				<h3> Ingresos y Egresos <small></small></h3>
			</div>
		</div>
	</div>
	@include('finanzas.finanzasTiles')
	<!--Vivientes Registrados-->
	<div class="row" id="tablaIngresosEgresos">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Staff Registrados <small></small></h2>
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
					<div class="col-md-6 col-sm-12 col-xs-12">
						<h1>Ingresos</h1>
						<table id="tablaIngresos" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Viviente/Staff</th>
									<th>Nombre Persona</th>
									<th>Modo de Pago</th>
									<th>Monto</th>
									<th>Comentarios</th>
									<th>id</th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<h1>Egresos</h1>
						<table id="tablaEgresos" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Area</th>
									<th>Nombre Persona</th>
									<th>Descripción</th>
									<th>Monto</th>
									<th>id</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="editarEliminarIngreso"></div>
		@include('finanzas.altaIngreso')
		@include('finanzas.altaEgreso')
		<div id="editarEliminarEgreso"></div>
	</div>
	<br>
	<br>

</div>

@stop

@section('scripts')
	@include('finanzas.finanzasDashboardJavascript')
@stop