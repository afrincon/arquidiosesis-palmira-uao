<form method="post" action="{{ url('usuarios') }}" >
  {{ csrf_field() }}
  <div class="col-sm-12 col-md-12">
    <div class="form-group row">
      <label for="inputUsuario" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="name" id="inputUsuario" placeholder="Ingrese el nombre" autofocus value="{{ old('name') }}">
      </div>

      @if($errors->has('name'))
        <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
      @endif

    </div>
	
    <div class="form-group row">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Telefono</label>
      <div class="col-sm-6">
        <input type="number" class="form-control" name="telefono" id="inputTelefono" placeholder="Ingrese el telefono" autofocus value="{{ old('telefono') }}">
      </div>

      @if($errors->has('telefono'))
        <span class="help-block">
          <strong>{{ $errors->first('telefono') }}</strong>
        </span>
      @endif

    </div>	
	
    <div class="form-group row">
      <label for="inputEmail" class="col-sm-3 col-form-label">Correo electronico</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Ingrese el correo electronico"  value="{{ old('email') }}">
      </div>

      @if($errors->has('email'))
        <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
    </div>
	
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-3 col-form-label">Contraseña</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Ingrese la contraseña" value="{{ old('password') }}">
      </div>
      @if($errors->has('password'))
        <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group row">
      <label for="inputEstado" class="col-sm-3 col-form-label">Estado</label>
      <div class="col-sm-6">
        <select class="form-control" id="selectEstado" name="estado" value="{{ old('estado') }}">
			<option value="">Seleccione</option>
            <option value="Activo">Activo</option>          
            <option value="Inactivo">Inactivo</option>
        </select>
      </div>  

    </div>
	
    <div class="form-group row">
      <label for="inputFecnaci" class="col-sm-3 col-form-label">Fecha nacimiento</label>
      <div class="col-sm-6">
        <input type="date" class="form-control" name="fecha_nacimiento" id="inputFecnaci"  autofocus value="{{ old('fecha_nacimiento') }}">
      </div>

      @if($errors->has('fecha_nacimiento'))
        <span class="help-block">
          <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
        </span>
      @endif

    </div>	
	
    <div class="form-group row">
      <label for="inputFecingre" class="col-sm-3 col-form-label">Fecha ingreso</label>
      <div class="col-sm-6">
        <input type="date" class="form-control" name="fecha_ingreso" id="inputFecingre"  autofocus value="{{ old('fecha_ingreso') }}">
      </div>

      @if($errors->has('fecha_ingreso'))
        <span class="help-block">
          <strong>{{ $errors->first('fecha_ingreso') }}</strong>
        </span>
      @endif

    </div>	
	
    <div class="form-group row">
      <label for="inputPerfil" class="col-sm-3 col-form-label">Perfil</label>
      <div class="col-sm-6">
        <select class="form-control" id="selectPerfil" name="perfil" value="{{ old('perfil') }}">
			<option value="">Seleccione</option>
            <option value="Administrador">Administrador</option>          
            <option value="Usuario">Usuario</option>
        </select>
      </div>  

    </div>	


	<div class="form-group row">
		<div class="col-sm-6 col-md-6" align="right">
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
		
		<div class="col-sm-6 col-md-6" align="left">
			<a class="btn btn-primary" href="{{ url('/usuarios') }}" role="button">Salir</a>
		</div>
	</div>
  </div>
</form>
