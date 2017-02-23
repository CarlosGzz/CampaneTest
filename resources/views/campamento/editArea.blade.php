<!-- Edit Area Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Editar Area
			</h2>
			<div class="btn-group pull-right">
		        	<a id="delete" data-route="{{route('area.destroy', $area->id)}}" onclick="borrar(this)"  class="btn btn-default btn-sm">
		        		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
		        	</a>

					<a id="cerrar" onclick="cerrarArea()" class="btn btn-danger btn-sm">
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
			{!! Form::open(['route' => ['area.update', $area->id], 'method' => 'PATCH']) !!}
			<!--Pais-->
			<div class="form-group">
				{!! Form::label('area','Area') !!}*
				{!! Form::text('area',$area->area,['class'=>'form-control', 'placeholder' => 'Area', 'required']) !!}
			</div>
			<!--Tipo de Familiar-->
			<div class="form-group">
				{!! Form::label('activa','Activa*') !!}
				@if ($area->activa == 1)
					{!! Form::checkbox('activa', '1', true) !!}
				@else
					{!! Form::checkbox('activa', '1', false) !!}
				@endif
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