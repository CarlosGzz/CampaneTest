<!-- Alta Campamento Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Alta Area
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
			{!! Form::open(['route' => 'area.store', 'method' => 'POST']) !!}
			<!--Area-->
			<div class="form-group">
				{!! Form::label('area','Area') !!}*
				{!! Form::text('area','',['class'=>'form-control', 'placeholder' => 'Area', 'required']) !!}
			</div>
			<!--Area Activa-->
			<div class="form-group">
				{!! Form::label('activa','Activa*') !!}
				{!! Form::checkbox('activa', '1', true) !!}
			</div>
			<!--Boton-->
			<div class="form-group">
				{!! Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>