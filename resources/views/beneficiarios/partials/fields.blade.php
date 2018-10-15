<form method="post" action="{{ route('beneficiarios.update', $beneficiario->id_beneficiario) }}" >
@method('put')
{{ csrf_field() }}
    <div class="col-sm-12 col-md-12">
        <div class="form-group row">
            <label for="inputNombre" class="col-sm-3 col-form-label">Nombre</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nombre" id="inputBeneficiario" autofocus value="{{ old('nombre', $beneficiario->nombre) }}">
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
                <input type="text" class="form-control" name="apellido" id="inputBeneficiario" autofocus value="{{ old('apellido', $beneficiario->apellido) }}">
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
                <select class="form-control" id="selectId_tipo_documento" name="id_tipo_documento" value="{{ old('id_tipo_documento', $beneficiario->id_tipo_documento) }}">
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
                <input type="text" class="form-control" name="documento" id="inputDocumento" value="{{ old('documento', $beneficiario->documento) }}">
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
                <input type="text" class="form-control" name="telefono" id="inputTelefono" value="{{ old('telefono', $beneficiario->telefono) }}">
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
                <input type="text" class="form-control" name="direccion" id="inputDireccion" value="{{ old('direccion', $beneficiario->direccion) }}">
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
                <select class="form-control" id="selectEstado" name="estado" value="{{ $beneficiario->estado }}">
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