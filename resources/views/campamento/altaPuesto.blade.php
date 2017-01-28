<!-- Alta Puesto Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Alta Puesto
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
			{!! Form::open(['route' => 'puesto.store', 'method' => 'POST']) !!}
			<!--Puesto-->
			<div class="form-group">
				{!! Form::label('puesto','Puesto') !!}*
				{!! Form::text('puesto','',['class'=>'form-control', 'placeholder' => 'Puesto', 'required']) !!}
			</div>
			<!--Boton-->
			<div class="form-group">
				{!! Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>