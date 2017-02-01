<!-- Edit Staff Form-->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="panel panel-warning">
		<div class="panel-heading clearfix">
			<h2 class="panel-title pull-left" >
				Editar Staff
			</h2>
			<div class="btn-group pull-right">
		        	<a id="delete" data-route="{{route('staff.destroy', $staff->id)}}" onclick="borrar(this)"  class="btn btn-default btn-sm">
		        		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
		        	</a>

					<a id="cerrar" onclick="cerrarStaff()" class="btn btn-danger btn-sm">
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
			{!! Form::open(['route' => ['staff.update', $staff->id], 'method' => 'PATCH']) !!}
			<!--Nombre-->
			<div class="form-group">
				{!! Form::label('nombre','Nombre') !!}*
				{!! Form::text('nombre',$staff->nombre,['class'=>'form-control', 'placeholder' => 'Campamento OT-16', 'required']) !!}
			</div>
			<!--Apellido Paterno-->
			<div class="form-group">
				{!! Form::label('naapellidoPaternome','Apellido Paterno ') !!}*
				{!! Form::text('apellidoPaterno', $staff->apellidoPaterno, ['class'=>'form-control','required']) !!}
			</div>


			<!--Apellido Materno-->
			<div class="form-group">
				{!! Form::label('apellidoMaterno','Apellido Materno*') !!}
				{!! Form::text('apellidoMaterno',$staff->apellidoMaterno,['class'=>'form-control', 'placeholder' => 'Martinez','maxlength' => '120', 'required']) !!}
			</div>

			<!--Genero-->
			<div class="form-group">
				{!! Form::label('genero','Genero*') !!}
				<div class="btn-group" data-toggle="buttons">
					<p>
						@if($staff->genero == 'M')
						M: {{Form::radio('genero', 'M','true' ,['class' => 'flat'])}}
						F: {{Form::radio('genero', 'F','' ,['class' => 'flat'])}}
						@else
						M: {{Form::radio('genero', 'M','' ,['class' => 'flat'])}}
						F: {{Form::radio('genero', 'F','true' ,['class' => 'flat'])}}
						@endif
					</p>
				</div>
			</div>

                            <!--Fecha Nacimiento-->
                            <div class="form-group">
                                {!! Form::label('fechaNacimiento','Fecha de Nacimiento*') !!}
                                {!! Form::date('fechaNacimiento', $staff->fechaNacimiento, ['class'=>'flatpickr form-control','required']) !!}
                            </div>

                            <!--Carrera y Universidad-->
                            <div class="form-group">
                                {!! Form::label('name','Carrera y Universidad*') !!}
                                    {!! Form::text('carrera',$staff->carrera,['class'=>'form-control', 'placeholder' => 'Carrera','minlength' => '5','maxlength' => '120','title'=>'Por favor escribe el nombre completo de tu carrera', 'required']) !!}
                                    {!! Form::text('universidad',$staff->universidad,['class'=>'form-control', 'placeholder' => 'Universidad','maxlength' => '120','title'=>'Por favor escribe las siglas de tu Universidad', 'required']) !!}
                            </div>

                            <!--Estatus Estudiante o Graduado-->
                            <div class="form-group">
                                {!! Form::label('estudianteGraduado','Estatus*') !!}
                                    <div class="btn-group" data-toggle="buttons">
                                        <p>
                                            @if($staff->estudianteGraduado == 'estudiante')
                                                Estudiante: {{Form::radio('estudianteGraduado', 'estudiante','true',['class' => 'flat'])}}
                                                Graduado: {{Form::radio('estudianteGraduado', 'graduado','',['class' => 'flat'])}}
                                            @else
                                                Estudiante: {{Form::radio('estudianteGraduado', 'estudiante','',['class' => 'flat'])}}
                                                Graduado: {{Form::radio('estudianteGraduado', 'graduado','true',['class' => 'flat'])}}
                                            @endif
                                        </p>
                                    </div>
                            </div>

                            <!--Gaia-->
                            <div class="form-group">
                                {!! Form::label('name','Gaia*') !!}
                                {!! Form::select('gaia_id', array('1' => 'Draco', '2' => 'Fénix', '3' => 'Lycan', '4' => 'Quimera', '5' => 'Unicornio'), $staff->gaia_id,['class'=>'form-control select', 'required']) !!}
                            </div>

                            <!--Rol-->
                            <div class="form-group">
                                {!! Form::label('rolDeseado','Rol Deseado*') !!}
                                {!! Form::select('rolDeseado', array('front' => 'Front', 'back' => 'Back', 'Cocina' => 'Cocina', 'donde sea' => 'Donde se necesite'), $staff->rolDeseado,['class'=>'form-control select', 'required'])!!}
                            </div>
                            
                            <!--Pulsera-->
                            <div class="form-group">
                                {!! Form::label('pulsera','Pulsera*') !!}
                                {!! Form::select('pulsera', array('ninguna' => 'Ninguna','verde' => 'Verde', 'blanca' => 'Blanca', 'roja' => 'Roja', 'plateada' => 'Plateada'), $staff->pulsera,['class'=>'form-control select', 'required'])!!}
                                
                            </div>

                            <!--Correo-->
                            <div class="form-group">
                                {!! Form::label('correo','Correo*') !!}
                                {!! Form::email('correo',$staff->correo,['class'=>'form-control', 'placeholder' => 'staff@kemen.com','maxlength' => '120', 'required']) !!}
                            </div>

                            <!--Celular-->
                            <div class="form-group">
                                {!! Form::label('telefonoCel','Celular*') !!}
                                {!! Form::text('telefonoCel',$staff->telefonoCel,['class'=>'form-control', 'placeholder' => '8117784890','maxlength' => '120', 'required']) !!}
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