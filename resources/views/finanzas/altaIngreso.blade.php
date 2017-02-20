<!-- Alta Campamento Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Alta Ingreso
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
			{!! Form::open(['route' => 'ingreso.store', 'method' => 'POST']) !!}
			<!--Fecha-->
			<div class="form-group">
				{!! Form::label('fecha','Fecha') !!}*
				{!! Form::date('fecha', \Carbon\Carbon::now(), ['class'=>'flatpickr form-control','required']) !!}
			</div>
			<!--Staff o Viviente-->
			<div class="form-group">
				{!! Form::label('staffVivienteOtro','Staff o Viviente') !!}*
				{!! Form::select('staffVivienteOtro', array('staff' => 'Staff', 'viviente' => 'Viviente', 'otro' => 'Otro'),'viviente',['class'=>'form-control select', 'required', 'id' => 'staffVivienteOtro'])!!}
			</div>
			<!--Staff-->
			<div class="form-group">
				{!! Form::label('staff','Staff') !!}
				{!! Form::select('staff', array(),'',['class'=>'form-control select', 'required', 'disabled', 'id' => 'staff'])!!}
			</div>
			<!--Viviente-->
			<div class="form-group">
				{!! Form::label('viviente','Viviente') !!}
				{!! Form::select('viviente', array(),'',['class'=>'form-control select', 'required', 'id' => 'viviente'])!!}
			</div>
			<!--Otro-->
			<div class="form-group">
				{!! Form::label('otro','Otro') !!}
				{!! Form::text('otro','',['class'=>'form-control', 'placeholder' => 'otro','maxlength' => '120', 'required', 'disabled', 'id' => 'otro']) !!}
			</div>
			<!--Tipo de Ingreos-->
			<div class="form-group">
				{!! Form::label('metodoDePago','Modo de Pago') !!}
				{!! Form::select('metodoDePago', array('efectivo' => 'Efectivo', 'deposito' => 'Deposito'),'efectivo',['class'=>'form-control select', 'required', 'id' => 'metodoDePago'])!!}
			</div>
			<!--Monto-->
			<div class="form-group">
				{!! Form::label('monto','Monto') !!}
				{!! Form::number('monto','',['class'=>'form-control', 'placeholder' => '0', 'required']) !!}
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