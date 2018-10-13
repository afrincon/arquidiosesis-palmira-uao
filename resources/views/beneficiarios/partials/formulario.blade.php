<form method="post" action="{{ url('beneficiarios') }}" >
  {{ csrf_field() }}
  <div class="col-sm-12 col-md-12">
    <div class="form-group row">
      <label for="inputBeneficiario" class="col-sm-3 col-form-label">Nombre beneficiario</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="nombre" id="inputBeneficiario" placeholder="Ingrese el nombre del beneficiario" autofocus value="{{ old('nombre') }}">
      </div>

      @if($errors->has('nombre'))
        <span class="help-block">
          <strong>{{ $errors->first('nombre') }}</strong>
        </span>
      @endif
    </div>
	
	<div class="form-group row">
	  <label for="inputBeneficiario" class="col-sm-3 col-form-label">Apellido beneficiario</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="apellido" id="inputBeneficiario" placeholder="Ingrese el apellido del beneficiario" autofocus value="{{ old('apellido') }}">
      </div>

      @if($errors->has('apellido'))
        <span class="help-block">
          <strong>{{ $errors->first('apellido') }}</strong>
        </span>
      @endif
    </div>

	    <div class="form-group row">
      <label for="inputTipoDocumento" class="col-sm-3 col-form-label">TipoDocumento</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="id_tipo_documento" id="inputTipoDocumento" placeholder="Ingrese el tipo de documento"  value="{{ old('id_tipo_documento') }}">
      </div>

      @if($errors->has('id_tipo_documento'))
        <span class="help-block">
          <strong>{{ $errors->first('id_tipo_documento') }}</strong>
        </span>
      @endif
    </div>
	
    <div class="form-group row">
      <label for="inputDocumento" class="col-sm-3 col-form-label">Documento</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="documento" id="inputDocumento" placeholder="Ingrese el N° de documento"  value="{{ old('documento') }}">
      </div>

      @if($errors->has('documento'))
        <span class="help-block">
          <strong>{{ $errors->first('documento') }}</strong>
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
      <label for="inputDireccion" class="col-sm-3 col-form-label">Dirección</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="direccion" id="inputDireccion" placeholder="Ingrese la direccion" value="{{ old('direccion') }}">
      </div>

      @if($errors->has('direccion'))
        <span class="help-block">
          <strong>{{ $errors->first('direccion') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group row">
      <label for="inputEstado" class="col-sm-3 col-form-label">Estado del beneficiario</label>
      <div class="col-sm-6">
        <select class="form-control" id="selectEstado" name="estado" value="{{ old('estado') }}">
          <option value="Activo">Activo</option>
          <option value="Inactivo">Inactivo</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputClasificacion" class="col-sm-3 col-form-label">Clasificacion del beneficiario</label>
      <div class="col-sm-6">
        <select class="form-control" id="selectClasificacion" name="clasificacion" value="{{ old('clasificacion') }}">
          <option value="Vulnerable N-1">Vulnerable N-1</option>
          <option value="Vulnerable N-2">Vulnerable N-2</option>
          <option value="Vulnerable N-3">Vulnerable N-3</option>
        </select>
      </div>
    </div>

    <div class="form-group col-sm-12 col-md-8">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-primary" href="{{ url('/beneficiarios') }}" role="button">Salir</a>
    </div>
  </div>
</form>