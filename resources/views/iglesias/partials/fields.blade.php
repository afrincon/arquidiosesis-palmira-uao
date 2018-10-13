<form method="post" action="{{ route('iglesias.update', $iglesia->id) }}" >
@method('put')
{{ csrf_field() }}    
  <div class="col-sm-12 col-md-12">
  <div class="form-group row">
      <label for="inputIglesia" class="col-sm-3 col-form-label">Nombre iglesia</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="nombre" id="inputIglesia" autofocus value="{{ old('nombre', $iglesia->nombre)  }}">
      </div>

      @if($errors->has('nombre'))
        <span class="help-block">
          <strong>{{ $errors->first('nombre') }}</strong>
        </span>
      @endif

    </div>
    <div class="form-group row">
      <label for="inputDireccion" class="col-sm-3 col-form-label">Dirección</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="direccion" id="inputDireccion" value="{{ old('direccion', $iglesia->direccion) }}">
      </div>

      @if($errors->has('direccion'))
        <span class="help-block">
          <strong>{{ $errors->first('direccion') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group row">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Teléfono</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="telefono" id="inputTelefono" value="{{ old('telefono', $iglesia->telefono) }}">
      </div>
      @if($errors->has('telefono'))
        <span class="help-block">
          <strong>{{ $errors->first('telefono') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group row">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Arquidiocesis principal</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="arquidiocesis" id="inputArquidiocesis" value="{{ old('arquidiocesis', $iglesia->arquidiocesis) }}">
      </div>
      @if($errors->has('arquidiocesis'))
        <span class="help-block">
          <strong>{{ $errors->first('arquidiocesis') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group row">
      <label for="inputUser" class="col-sm-3 col-form-label">Parroco asociado</label>
      <div class="col-sm-6">
        <select class="form-control" id="selectUser" name="user" >
            <option value="">Seleccionar un usuario</option>
          @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach

        </select>
      </div>
      @if($errors->has('user'))
        <span class="help-block">
          <strong>{{ $errors->first('user') }}</strong>
        </span>
      @endif

    </div>

    <div class="form-group row">
      <label for="inputEstado" class="col-sm-3 col-form-label">Estado de la iglesia</label>
      <div class="col-sm-6">
        <select class="form-control" id="selectEstado" name="estado" value="{{ $iglesia->estado }}">
            <option value="Activo">Activo</option>          
            <option value="Inactivo">Inactivo</option>
        </select>
      </div>  

    </div>

    <div class="form-group col-sm-12 col-md-8">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-primary" href="{{ url('/iglesias') }}" role="button">Salir</a>
    </div>
  </div>
</form>