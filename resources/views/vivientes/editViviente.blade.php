<!-- Edit Viviente Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Editar Viviente
			</h2>
			<div class="btn-group pull-right">
		        	<a id="delete" data-route="{{route('vivientes.destroy', $viviente->id)}}" onclick="borrar(this)"  class="btn btn-default btn-sm">
		        		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
		        	</a>

					<a id="cerrar" onclick="cerrarViviente()" class="btn btn-danger btn-sm">
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
			{!! Form::open(['route' => ['viviente.update', $viviente->id], 'method' => 'PATCH']) !!}
			<!--Nombre-->
			<div class="form-group">
				{!! Form::label('nombre','Nombre') !!}*
				{!! Form::text('nombre',$viviente->nombre,['class'=>'form-control', 'placeholder' => 'Jorge', 'required']) !!}
			</div>
			<!--Apellido Paterno-->
			<div class="form-group">
				{!! Form::label('apellidoPaterno','Apellido Paterno') !!}*
				{!! Form::text('apellidoPaterno',$viviente->apellidoPaterno,['class'=>'form-control', 'placeholder' => 'Gonzalez', 'required']) !!}
			</div>
			<!--Apellido Materno-->
			<div class="form-group">
				{!! Form::label('apellidoMaterno','Apellido Materno') !!}*
				{!! Form::text('apellidoMaterno',$viviente->apellidoMaterno,['class'=>'form-control', 'placeholder' => 'Gonzalez', 'required']) !!}
			</div>
			<!--Genero-->
			<div class="form-group">
				{!! Form::label('genero','Genero') !!}*
				@if ($viviente->genero == 'M')
					M: {!! Form::radio('genero', 'M', true) !!}
					F: {!! Form::radio('genero', 'F', false) !!}
				@else
					M: {!! Form::radio('genero', 'M', false) !!}
					F: {!! Form::radio('genero', 'F', true) !!}
				@endif
			</div>
			<!--Fecha Nacimiento-->
			<div class="form-group">
				{!! Form::label('fechaNacimiento','Fecha de Nacimiento') !!}*
				{!! Form::date('fechaNacimiento', $viviente->fechaNacimiento, ['class'=>'flatpickr form-control','required']) !!}
			</div>
			<!--Telefono-->
			<div class="form-group">
				{!! Form::label('telefonoCasa','Telefono') !!}*
				{!! Form::text('telefonoCasa',$viviente->telefonoCasa,['class'=>'form-control', 'placeholder' => '811778451', 'required']) !!}
			</div>
			<!--Celular-->
			<div class="form-group">
				{!! Form::label('celular','Celular') !!}*
				{!! Form::text('celular',$viviente->telefonoCel,['class'=>'form-control', 'placeholder' => '811334815', 'required']) !!}
			</div>
			<!--Correo-->
			<div class="form-group">
				{!! Form::label('correo','Correo') !!}*
				{!! Form::text('correo',$viviente->correo,['class'=>'form-control', 'placeholder' => 'kemen@kemen.com', 'required']) !!}
			</div>
			<!--Medio Campamento-->
			<div class="form-group">
				{!! Form::label('medioCampamento','Medio de Campamento*') !!}
				{!! Form::select('medioCampamento', array('Facebook' => 'Facebook', 'Anuncio' => 'Anuncio/Poster', 'Stand Universitario' => 'Stand Universitario', 'Miembro de Staff' => 'Miembro de Staff', 'Otro' => 'Otro'), $viviente->medioCampamento,['class'=>'form-control select','id' => 'medioCampamento', 'required'])!!}
			</div>
			@if($viviente->medioCampamento == 'Miembro de Staff')
				@if($viviente->staff_id == null)
					<!--staff-->
					<div class="form-group">
						{!! Form::label('staff','Staff') !!}
						{!! Form::select('staff', array(), 'Otro',['class'=>'form-control','id'=>'staffViejo'])!!}
					</div>
					<!--Otro-->
					<div class="form-group">
						{!! Form::label('otroStaff','Otro') !!}*
						{!! Form::text('otroStaff',$viviente->otro,['class'=>'form-control', 'placeholder' => '','id'=>'otroStaff']) !!}
					</div>
				@else
					<!--staff-->
					<div class="form-group">
						{!! Form::label('staff','Staff') !!}
						{!! Form::select('staff', array(), $viviente->staff_id,['class'=>'form-control','id'=>'staffViejo'])!!}
					</div>
					<!--Otro-->
					<div class="form-group">
						{!! Form::label('otroStaff','Otro') !!}*
						{!! Form::text('otroStaff','',['class'=>'form-control', 'placeholder' => '','id'=>'otroStaff', 'disabled']) !!}
					</div>
				@endif
			@else
				<!--staff-->
				<div class="form-group">
					{!! Form::label('staff','Staff') !!}
					{!! Form::select('staff', array(), '',['class'=>'form-control','id'=>'staffViejo','disabled'])!!}
				</div>
				<!--Otro-->
				<div class="form-group">
					{!! Form::label('otroStaff','Otro') !!}*
					{!! Form::text('otroStaff','',['class'=>'form-control', 'placeholder' => '','id'=>'otroStaff', 'disabled']) !!}
				</div>
			@endif
			<!--Observaciones-->
			<div class="form-group">
				{!! Form::label('name','Observaciones') !!}
				{!! Form::text('observaciones', $viviente->observaciones, ['class'=>'form-control']) !!}
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
<!-- Si es miembro de Staff-->
<script>
	$("#medioCampamento").on('select2:closing',function(){
		if($("#medioCampamento").val() == "Miembro de Staff"){
			$("#staffViejo").removeAttr('disabled');
		}else{
			$("#staffViejo").attr('disabled', 'disabled');
			$("#otroStaff").attr('disabled', 'disabled');
		}
	});
	$("#staffViejo").on('select2:closing',function(){
		if($("#staffViejo").val() == "Otro"){
			$("#otroStaff").removeAttr('disabled');
		}else{
			$("#otroStaff").attr('disabled', 'disabled');
		}
	});
</script>