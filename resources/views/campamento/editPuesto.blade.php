<!-- Edit Puesto Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Editar Puesto
			</h2>
			<div class="btn-group pull-right">
		        	<a id="delete" data-route="{{route('puesto.destroy', $puesto->id)}}" onclick="borrar(this)"  class="btn btn-default btn-sm">
		        		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
		        	</a>

					<a id="cerrar" onclick="cerrarPuesto()" class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						Cerrar
					</a>
		      </div>
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
			{!! Form::open(['route' => ['puesto.update', $puesto->id], 'method' => 'PATCH']) !!}
			<!--Pais-->
			<div class="form-group">
				{!! Form::label('puesto','Puesto') !!}*
				{!! Form::text('puesto',$puesto->puesto,['class'=>'form-control', 'placeholder' => 'Puesto', 'required']) !!}
			</div>
			<hr>
			<!--Boton-->
			<div class="form-group">
				{!! Form::submit('Guardar',['class'=>'btn btn-warning'])!!}
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>