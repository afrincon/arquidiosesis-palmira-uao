<form method="post" action="{{ route('ayudas.update', $ayuda->id_ayuda) }}" >
    @method('put')
    {{ csrf_field() }}
    <div class="col-sm-12 col-md-12">

        <div class="form-group row">
            <label for="inputFecha" class="col-sm-3 col-form-label">Fecha de entrega</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="fecha_ayuda" id="inputFecha" autofocus value="{{ old('fecha_ayuda', $ayuda->fecha_ayuda)  }}">
            </div>

            @if($errors->has('fecha_ayuda'))
                <span class="help-block">
          <strong>{{ $errors->first('fecha_ayuda') }}</strong>
        </span>
            @endif

        </div>
        <div class="form-group row">
            <label for="inputAyuda" class="col-sm-3 col-form-label">Tipo de ayuda</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="id_tipoayuda" id="inputAyuda" value="{{ old('id_tipoayuda', $ayuda->id_tipoayuda) }}">
            </div>

            @if($errors->has('id_tipoayuda'))
                <span class="help-block">
          <strong>{{ $errors->first('id_tipoayuda') }}</strong>
        </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="inputBeneficiario" class="col-sm-3 col-form-label">Identificacion del beneficiario</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="id_beneficiario" id="inputBeneficiario" value="{{ old('id_beneficiario', $ayuda->id_beneficiario) }}">
            </div>
            @if($errors->has('id_beneficiario'))
                <span class="help-block">
          <strong>{{ $errors->first('id_beneficiario') }}</strong>
        </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="inputIglesia" class="col-sm-3 col-form-label">Iglesia</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="id_iglesia" id="inputIglesia" value="{{ old('id_iglesia', $ayuda->id_iglesia) }}">
            </div>
            @if($errors->has('id_iglesia'))
                <span class="help-block">
          <strong>{{ $errors->first('id_iglesia') }}</strong>
        </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="inputObservaciones" class="col-sm-3 col-form-label">Observaciones</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="observaciones" id="inputObservaciones" value="{{ old('observaciones', $ayuda->observaciones) }}">
            </div>

        </div>

        <div class="form-group col-sm-12 col-md-8">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-primary" href="{{ url('/ayudas') }}" role="button">Salir</a>
        </div>
    </div>
</form>