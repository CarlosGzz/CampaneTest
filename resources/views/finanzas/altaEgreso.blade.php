<!-- Alta Campamento Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-danger">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Alta Egreso
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
			<!--Fecha-->
			<div class="form-group">
				{!! Form::label('fecha','Fecha') !!}*
				{!! Form::date('fecha', \Carbon\Carbon::now(), ['class'=>'flatpickr form-control','required']) !!}
			</div>
			<!--Area-->
			<div class="form-group">
				{!! Form::label('area','Area') !!}*
				{!! Form::select('area', array(),'viviente',['class'=>'form-control select', 'required'])!!}
			</div>
			<!--Staff-->
			<div class="form-group">
				{!! Form::label('staff','Staff') !!}
				{!! Form::select('staff', array(),'viviente',['class'=>'form-control select', 'required'])!!}
			</div>
			<!--Descripcion-->
			<div class="form-group">
				{!! Form::label('descripcion','Descripción') !!}
				{!! Form::text('descripcion','',['class'=>'form-control', 'placeholder' => 'otro','maxlength' => '120', 'required']) !!}
			</div>
			<!--Monto-->
			<div class="form-group">
				{!! Form::label('monto','Monto') !!}
				{!! Form::number('monto','',['class'=>'form-control', 'placeholder' => '000','maxlength' => '120', 'required']) !!}
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