<!-- Alta Campamento Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Alta Campamento
			</h2>
		</div>
		<div class = "panel-body">
			@if(count($errors) > 0)
			<div class="row">
				<div class ="alert alert-danger" role="alert">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
			@endif
			{!! Form::open(['route' => 'campamento.store', 'method' => 'POST']) !!}
			<!--Pais-->
			<div class="form-group">
				{!! Form::label('name','Nombre de Campamento') !!}*
				{!! Form::text('nombre','',['class'=>'form-control', 'placeholder' => 'Campamento OT-16', 'required']) !!}
			</div>
			<!--Fecha Inicio-->
			<div class="form-group">
				{!! Form::label('name','Fecha De Inicio') !!}*
				{!! Form::date('fechaInicio', \Carbon\Carbon::now(), ['class'=>'flatpickr form-control','required']) !!}
			</div>
			<!--Fecha Final-->
			<div class="form-group">
				{!! Form::label('name','Fecha Final') !!}*
				{!! Form::date('fechaFinal', \Carbon\Carbon::now()->addDays(3), ['class'=>'flatpickr form-control','required']) !!}
			</div>
			<!--Actual-->
			<div class="form-group">
				{!! Form::label('name','Actual') !!} (solo puede haber un campamento actual)
				{!! Form::checkbox('actual', '1') !!}
			</div>
			<hr>
			<!--Boton-->
			<div class="form-group">
				{!! Form::submit('Crear Edicion',['class'=>'btn btn-primary'])!!}
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>