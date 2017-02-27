<!-- Edit Ingreso Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Editar Ingreso
			</h2>
			<div class="btn-group pull-right">
		        	<a id="delete" data-route="{{route('egreso.destroy', $egreso->id)}}" onclick="borrar(this)"  class="btn btn-default btn-sm">
		        		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
		        	</a>

					<a id="cerrar" onclick="cerrarEgreso()" class="btn btn-danger btn-sm">
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
			{!! Form::open(['route' => ['egreso.update', $egreso->id], 'method' => 'PATCH']) !!}
			<!--Fecha-->
			<div class="form-group">
				{!! Form::label('fecha','Fecha') !!}*
				{!! Form::date('fecha',$egreso->fecha, ['class'=>'flatpickr form-control','required']) !!}
			</div>
			<!--Area-->
			<div class="form-group">
				{!! Form::label('area','Area') !!}*
				{!! Form::select('area', array(),$egreso->area_id,['class'=>'form-control select', 'required', 'id' => 'area2'])!!}
			</div>
			<!--Staff-->
			<div class="form-group">
				{!! Form::label('staff','Staff') !!}
				{!! Form::select('staff', array(),$egreso->staff_id,['class'=>'form-control select', 'id' => 'staff3', 'required'])!!}
			</div>
			<!--Descripcion-->
			<div class="form-group">
				{!! Form::label('descripcion','Descripción') !!}
				{!! Form::text('descripcion',$egreso->descripcion,['class'=>'form-control', 'placeholder' => 'Descripción de egreso','maxlength' => '120', 'required']) !!}
			</div>
			<!--Monto-->
			<div class="form-group">
				{!! Form::label('monto','Monto') !!}
				{!! Form::number('monto',$egreso->monto,['class'=>'form-control', 'placeholder' => '0','maxlength' => '120', 'required']) !!}
			</div>
			<hr>
			<!--Boton-->
			<div class="form-group">
				{!! Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>