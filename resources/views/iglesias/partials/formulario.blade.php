<form method="post" action="{{ url('iglesias') }}" >
  {{ csrf_field() }}
    <div class="col-sm-12 col-md-12">
    <div class="form-group row">
      <label for="inputIglesia" class="col-sm-3 col-form-label">Nombre iglesia</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="nombre" id="inputIglesia" placeholder="Ingrese el nombre de la iglesia" autofocus value="{{ old('nombre') }}">
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
        <input type="text" class="form-control" name="direccion" id="inputDireccion" placeholder="Ingrese la dirección de la iglesia"  value="{{ old('direccion') }}">
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
        <input type="text" class="form-control" name="telefono" id="inputTelefono" placeholder="Ingrese el teléfono de la iglesia" value="{{ old('telefono') }}">
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
        <input type="text" class="form-control" name="arquidiocesis" id="inputArquidiocesis" placeholder="Ingrese la arquidiocesis a la que pertenece la iglesia" value="{{ old('arquidiocesis') }}">
      </div>
      @if($errors->has('arquidiocesis'))
        <span class="help-block">
          <strong>{{ $errors->first('arquidiocesis') }}</strong>
        </span>
      @endif
    </div>
    <generic-select :old="'{{ old('user_id') }}'" :url="'/obtenerparrocos'" :label="'Parroco Asociado'" :propname="'user_id'"></generic-select>
    @if($errors->has('user_id'))
      <span class="help-block">
        <strong>{{ $errors->first('user_id') }}</strong>
      </span>
    @endif

    <input type="hidden" name="estado" value="Activo">
    
    </div>

    <div class="form-group col-sm-12 col-md-8">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-primary" href="{{ url('/iglesias') }}" role="button">Salir</a>
    </div>
  </div>
</form>