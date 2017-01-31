<!-- Edit Campamento Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Editar Usuario
			</h2>
			<div class="btn-group pull-right">
		        	<a id="delete" data-route="{{route('user.destroy', $user->id)}}" onclick="borrar(this)"  class="btn btn-default btn-sm">
		        		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
		        	</a>

					<a id="cerrar" onclick="cerrarUser()" class="btn btn-danger btn-sm">
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
			{!! Form::open(['route' => ['user.update', $user->id], 'method' => 'PATCH']) !!}
			<!--Pais-->
			<div class="form-group">
				{!! Form::label('name','Nombre') !!}*
				{!! Form::text('name',$user->name,['class'=>'form-control', 'placeholder' => 'Usuario', 'required']) !!}
			</div>
			<!--Usuario-->
			<div class="form-group">
				{!! Form::label('name','User') !!}*
				{!! Form::text('user', $user->user, ['class'=>'form-control','required']) !!}
			</div>
			<!--Correo-->
			<div class="form-group">
				{!! Form::label('name','Correo') !!}*
				{!! Form::text('email', $user->email, ['class'=>'form-control','required']) !!}
			</div>
			<!--Correo-->
			<div class="form-group">
				{!! Form::label('name','Tipo') !!}*
				<select id="tipo" class="form-control" name="tipo">
					@if( $user->tipo == 'admin')
						<option value="admin" selected>Web Admin</option>
						<option value="coordinador">Coordinador Campamento</option>
						<option value="mesa">Mesa Campamento</option>
						<option value="general">Coordinador General</option>
					@endif
					@if( $user->tipo == 'coordinador')
						<option value="admin">Web Admin</option>
						<option value="coordinador" selected>Coordinador Campamento</option>
						<option value="mesa">Mesa Campamento</option>
						<option value="general">Coordinador General</option>
					@endif
					@if( $user->tipo == 'mesa')
						<option value="admin">Web Admin</option>
						<option value="coordinador">Coordinador Campamento</option>
						<option value="mesa" selected>Mesa Campamento</option>
						<option value="general">Coordinador General</option>
					@endif
					@if( $user->tipo == 'general')
						<option value="admin">Web Admin</option>
						<option value="coordinador">Coordinador Campamento</option>
						<option value="mesa">Mesa Campamento</option>
						<option value="general" selected>Coordinador General</option>
					@endif
				</select>
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