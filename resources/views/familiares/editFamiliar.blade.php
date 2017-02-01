<!-- Edit Familiar Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Editar Familar
			</h2>
			<div class="btn-group pull-right">
		        	<a id="delete" data-route="{{route('familiares.destroy', $familiar->id)}}" onclick="borrar(this)"  class="btn btn-default btn-sm">
		        		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
		        	</a>

					<a id="cerrar" onclick="cerrarFamiliar()" class="btn btn-danger btn-sm">
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
			{!! Form::open(['route' => ['familiares.update', $familiar->id], 'method' => 'PATCH']) !!}
			<!--Correo-->
			<div class="form-group">
				{!! Form::label('name','Nombre') !!}*
				{!! Form::text('nombre',$familiar->nombre,['class'=>'form-control', 'placeholder' => 'Campamento OT-16', 'required']) !!}
			</div>
			<!--Telefono-->
			<div class="form-group">
				{!! Form::label('telefono','Telefono') !!}*
				{!! Form::text('telefono', $familiar->telefono, ['class'=>'form-control']) !!}
			</div>
			<!--Celular-->
			<div class="form-group">
				{!! Form::label('celular','Celular') !!}*
				{!! Form::text('celular', $familiar->celular, ['class'=>'form-control','required']) !!}
			</div>
			<!--Fecha Inicio-->
			<div class="form-group">
				{!! Form::label('correo','Correo') !!}*
				{!! Form::text('correo', $familiar->correo, ['class'=>'form-control','required']) !!}
			</div>
			<!--Tipo de Familiar-->
			<div class="form-group">
				{!! Form::label('tipoFamiliar','Tipo Familiar*') !!}
				{!! Form::select('tipoFamiliar', array('Padre' => 'Padre', 'Madre' => 'Madre', 'Amigo1' => 'Amigo1', 'Amigo2' => 'Amigo2', 'Amigo3' => 'Amigo3'), $familiar->tipoFamiliar,['class'=>'form-control select', 'required'])!!}
			</div>
			<!--Tipo de Familiar-->
			<div class="form-group">
				{!! Form::label('esViviente','Es Viviente*') !!}
				@if ($familiar->esViviente == 1)
					{!! Form::checkbox('esViviente', '1', true) !!}
				@else
					{!! Form::checkbox('esViviente', '1', false) !!}
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