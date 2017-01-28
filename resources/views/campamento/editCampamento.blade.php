<!-- Edit Campamento Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Editar Campamento
			</h2>
			<div class="btn-group pull-right">
		        	<a id="delete" data-route="{{route('campamento.destroy', $campamento->id)}}" onclick="borrar(this)"  class="btn btn-default btn-sm">
		        		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
		        	</a>

					<a id="cerrar" onclick="cerrarCampamento()" class="btn btn-danger btn-sm">
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
			{!! Form::open(['route' => ['campamento.update', $campamento->id], 'method' => 'PATCH']) !!}
			<!--Pais-->
			<div class="form-group">
				{!! Form::label('name','Nombre de Campamento') !!}*
				{!! Form::text('nombre',$campamento->nombre,['class'=>'form-control', 'placeholder' => 'Campamento OT-16', 'required']) !!}
			</div>
			<!--Fecha Inicio-->
			<div class="form-group">
				{!! Form::label('name','Fecha De Inicio') !!}*
				{!! Form::date('fechaInicio', $campamento->fechaInicio, ['class'=>'flatpickr form-control','required']) !!}
			</div>
			<!--Fecha Final-->
			<div class="form-group">
				{!! Form::label('name','Fecha Final') !!}*
				{!! Form::date('fechaFinal', $campamento->fechaFinal, ['class'=>'flatpickr form-control','required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('name','Actual') !!} (solo puede haber un campamento actual)
				@if ($campamento->actual) 
					{!! Form::checkbox('actual', '1',true) !!}
				@else
					{!! Form::checkbox('actual', '1') !!}
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