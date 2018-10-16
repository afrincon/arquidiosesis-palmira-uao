<form method="post" action="{{ url('beneficiarios') }}" >
  {{ csrf_field() }}
  <div class="col-sm-12 col-md-12">
    <div class="form-group row">
      <label for="inputNombre" class="col-sm-3 col-form-label">Nombre</label>
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
	  <label for="inputApellido" class="col-sm-3 col-form-label">Apellido</label>
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
      <label for="inputTipodocumento" class="col-sm-3 col-form-label">Tipo Documento</label>
      <div class="col-sm-6">
        <select class="form-control" id="selectId_tipo_documento" name="id_tipo_documento" value="{{ old('id_tipo_documento') }}">
          <option value="">Seleccionar un tipo de documento</option>
          @foreach($tipoDocumento as $tipo)
            <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
          @endforeach
        </select>
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
        <input type="text" class="form-control" name="documento" id="inputDocumento" placeholder="Ingrese el N° de documento del beneficiario"  value="{{ old('documento') }}">
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
        <input type="text" class="form-control" name="telefono" id="inputTelefono" placeholder="Ingrese el teléfono del beneficiario" value="{{ old('telefono') }}">
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
        <input type="text" class="form-control" name="direccion" id="inputDireccion" placeholder="Ingrese la dirección del beneficiario" value="{{ old('direccion') }}">
      </div>

      @if($errors->has('direccion'))
        <span class="help-block">
          <strong>{{ $errors->first('direccion') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group row">
      <label for="inputEstado" class="col-sm-3 col-form-label">Estado</label>
      <div class="col-sm-6">
        <select class="form-control" id="selectEstado" name="estado" value="{{ old('estado') }}">
          <option value="Activo">Activo</option>
          <option value="Inactivo">Inactivo</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputClasificacion" class="col-sm-3 col-form-label">Clasificacion</label>
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