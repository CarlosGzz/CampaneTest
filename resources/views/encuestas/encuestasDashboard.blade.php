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
	<!-- Title -->
	<div class="row">
		<div class="page-title">
			<div class="title_left">
				<h3> Encuestas<small> informacion detallada de encuestas de vivientes</small></h3>
			</div>
		</div>
	</div>

	<!--Vivientes Registrados Parciales-->
	<div class="row" id="tablaFamiliares">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Encuestas<small></small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="encuestas" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Viviente</th>
								<th>Quimera</th>
								<th>Lycan</th>
								<th>Draco</th>
								<th>Fénix</th>
								<th>Unicornio</th>
								<th>Personalidad</th>
								<th>Descripcion</th>
								<th>Cualidades</th>
								<th>Defectos</th>
								<th>En una Fiesta</th>
								<th>Cualidades1</th>
								<th>Cualidades2</th>
								<th>Cualidades3</th>
								<th>Cualidades4</th>
								<th>Cualidades5</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<br>

</div>

@stop

@section('scripts')
	@include('encuestas.encuestasDashboardJavascript')
@stop