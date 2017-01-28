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
			<!--Puesto-->
			<div class="form-group">
				{!! Form::label('puest','Puesto') !!}*
				{!! Form::text('puesto','',['class'=>'form-control', 'placeholder' => 'Campamento OT-16', 'required']) !!}
			</div>
			<!--Boton-->
			<div class="form-group">
				{!! Form::submit('Crear Edicion',['class'=>'btn btn-primary'])!!}
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>