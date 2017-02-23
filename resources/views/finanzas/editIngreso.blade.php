<!-- Edit Ingreso Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Editar Ingreso
			</h2>
			<div class="btn-group pull-right">
		        	<a id="delete" data-route="{{route('ingreso.destroy', $ingreso->id)}}" onclick="borrar(this)"  class="btn btn-default btn-sm">
		        		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
		        	</a>

					<a id="cerrar" onclick="cerrarIngreso()" class="btn btn-danger btn-sm">
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
			{!! Form::open(['route' => ['ingreso.update', $ingreso->id], 'method' => 'PATCH']) !!}
			<!--Fecha-->
			<div class="form-group">
				{!! Form::label('fecha','Fecha') !!}*
				{!! Form::date('fecha',$ingreso->fecha, ['class'=>'flatpickr form-control','required']) !!}
			</div>
			<!--Tipo de Ingreos-->
			<div class="form-group">
				{!! Form::label('metodoDePago','Modo de Pago') !!}
				{!! Form::select('metodoDePago', array('efectivo' => 'Efectivo', 'deposito' => 'Deposito'),$ingreso->metodoDePago,['class'=>'form-control select', 'required', 'id' => 'metodoDePago'])!!}
			</div>
			<!--Monto-->
			<div class="form-group">
				{!! Form::label('monto','Monto') !!}
				{!! Form::number('monto',$ingreso->monto,['class'=>'form-control', 'placeholder' => '0', 'required']) !!}
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