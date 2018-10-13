{{ Form::model($usuario, array('route' => array('usuarios.update', $usuario->id), 'method' => 'PUT')) }}
    {{ csrf_field() }}
    <div class="col-sm-12 col-md-12">
        <div class="form-group row">
            <label for="inputUsuario" class="col-sm-3 col-form-label">Nombre usuario</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" id="inputUsuario" placeholder="Ingrese el nombre de usuario" autofocus value="{{ $usuario->name }}">
            </div>

            @if($errors->has('name'))
            <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
            @endif

        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-3 col-form-label">Correo electronico</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Ingrese el correo electronico"  value="{{ $usuario->email }}">
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
            <label for="inputEstado" class="col-sm-3 col-form-label">Estado de la iglesia</label>
            <div class="col-sm-6">
                <select class="form-control" id="selectEstado" name="estado" value="{{ $usuario->estado }}">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>

        </div>



        <div class="form-group col-sm-12 col-md-8">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-primary" href="{{ url('/usuarios') }}" role="button">Salir</a>
        </div>
    </div>
{{ Form::close() }}
