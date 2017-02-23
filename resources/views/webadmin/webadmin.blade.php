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
	<div class="row">
		<div class="page-title">
			<div class="title_left">
				<h3> Web Admin Panel <small></small></h3>
			</div>
		</div>
	</div>
	<!--Datatable Campamentos-->
	<div class="row" id="tablaCampamentos">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Campamentos <small></small></h2>
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
					<table id="campamentos" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>id</th>
								<th>Nombre</th>
								<th>Fecha Inicio</th>
								<th>Fecha Final</th>
								<th>Actual</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="editarEliminarCampamento"></div>
		@include('campamento/altaCampamento')
	</div>
	<br>
	<div class="row" id="tablaGaias">
		<!--Gaias Datatable-->
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Gaia <small></small></h2>
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
					<table id="gaias" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>id</th>
								<th>Gaia</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
		<!--Puestos Datatable-->
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Puestos <small></small></h2>
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
					<table id="puestos" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>id</th>
								<th>Puesto</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		@include('campamento/altaGaia')
		<div id="editarEliminarGaia"></div>
		<div id="editarEliminarPuesto"></div>
		@include('campamento/altaPuesto')
	</div>

	<!--Datatable Campamentos-->
	<div class="row" id="tablaUser">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Usuarios <small></small></h2>
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
					<table id="user" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>id</th>
								<th>Nombre</th>
								<th>User</th>
								<th>Correo</th>
								<th>Tipo</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="editarEliminarUser"></div>
	</div>

	<!--Datatable areas-->
	<div class="row" id="tablaArea">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tabla de Areas <small></small></h2>
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
					<table id="area" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>id</th>
								<th>Area</th>
								<th>Activa</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		@include('campamento/altaArea')
		<div id="editarEliminarArea"></div>
	</div>

</div>
@endsection

@section('scripts')
	@include('webadmin/webadminJavascript')
@stop