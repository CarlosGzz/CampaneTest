
<h2 class="StepTitle">Datos Personales</h2>
<br>
{!! Form::open(['route' => 'encuestaVivientes.store', 'method' => 'POST','id'=>'encuestaVivienteForm']) !!}
<div id="datosPersonales" data-parsley-validate class="form-horizontal form-label-left" style="width:100%" >
    <div class="form-group">
        <label for="nombre" class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"> 
            Nombre<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" maxlength="120" title="Si tienes más de uno, escríbelos todos">
        </div>
    </div>
    <div class="form-group">
        <label for="apellidoPaterno" class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">
            Apellido Paterno<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" id="apellidoPaterno" name="apellidoPaterno" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
        </div>
    </div>
    <div class="form-group">
        <label for="apellidoMaterno" class="control-label col-md-4 col-sm-4 col-xs-12">
            Apellido Materno<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" id="apellidoMaterno" name="apellidoMaterno" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
        </div>
    </div>
    <div class="form-group">
        <label for="genero" class="control-label col-md-4 col-sm-4 col-xs-12">Genero</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="btn-group" data-toggle="buttons">
                <p>
                    M:
                    <input id="genero" type="radio" class="flat" name="genero" value="M" checked=""/> 
                    F:
                    <input id="genero" type="radio" class="flat" name="genero" value="F" />
                </p>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="fechaNacimiento" class="control-label col-md-4 col-sm-4 col-xs-12">
            Fecha de Nacimiento<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input id="fechaNacimiento" class="form-control flatpickr col-md-7 col-xs-12" required="required" type="date" title="Mes/Dia/Año" >
        </div>
        <!-- Flat DateTime Picker-->
        <script src="https://unpkg.com/flatpickr"></script>
        <script type="text/javascript">
        flatpickr(".flatpickr", {
            altInput: true,
            altFormat: "j, F, Y"
        });
        </script>
    </div>
    <div class="form-group">
        <label for="telefonoCel" class="control-label col-md-4 col-sm-4 col-xs-12">
            Celular<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" id="telefonoCel" name="telefonoCel" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
        </div>
    </div>
    <div class="form-group">
        <label for="telefonoCasa" class="control-label col-md-4 col-sm-4 col-xs-12">
            Teléfono de Casa<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" id="telefonoCasa" name="telefonoCasa" required="required" class="form-control col-md-7 col-xs-12" maxlength="120">
        </div>
    </div>
    <div class="form-group">
        <label for="correo" class="control-label col-md-4 col-sm-4 col-xs-12">
            Correo<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="email" id="correo" name="correo" required="required" class="form-control col-md-7 col-xs-12" maxlength="200">
        </div>
    </div>
    <div class="form-group">
        <label for="genero" class="control-label col-md-4 col-sm-4 col-xs-12">Restricciones alimetarias</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="btn-group" data-toggle="buttons">
                <p>
                    Ninguna:
                    <input id="restriccionesAlimentarias" type="radio" class="flat" name="restriccionesAlimentarias" value="Ninguna" checked="" />
                    Vegetariano:
                    <input id="restriccionesAlimentarias" type="radio" class="flat" name="restriccionesAlimentarias" value="Vegetariano"/> 
                    Vegano:
                    <input id="restriccionesAlimentarias" type="radio" class="flat" name="restriccionesAlimentarias" value="Vegano" />
                </p>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="alergias" class="control-label col-md-4 col-sm-4 col-xs-12">
            Alergias
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" id="alergias" name="alergias" class="form-control col-md-7 col-xs-12" maxlength="120">
        </div>
    </div>
    <div class="form-group">
        <label for="medioCampamento" class="control-label col-md-4 col-sm-4 col-xs-12">
            ¿Cómo te enteraste del campamento?<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="medioCampamento" name="medioCampamento" class="form-control" required>
                <option value="Facebook">Facebook</option>
                <option value="Anuncio">Anuncio/Poster</option>
                <option value="Stand Universitario">Stand Universitario</option>
                <option value="Miembro de Staff">Miembro de Staff</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
    </div>
    <div class="form-group" id="inputStaff">
        <label for="staff" class="control-label col-md-4 col-sm-4 col-xs-12">
            ¿Quién?
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="staff" name="staff" class="form-control"  disabled>
                <option value="Otro">Otro</option>
            </select>
        </div>
    </div>
    <div class="form-group" id="inputStaff2">
        <label for="otroStaff" class="control-label col-md-4 col-sm-4 col-xs-12">
            Otro
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" id="otroStaff" name="otroStaff" class="form-control col-md-7 col-xs-12" maxlength="200" disabled>
        </div>
    </div>
    <br>
</div>
