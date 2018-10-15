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
                <select class="form-control" id="inputAyuda" name="id_tipoayuda" value="{{old('tipo_ayuda', $ayuda->id_tipoayuda)}}" >
                    <option value="">Seleccionar una ayuda</option>
                    @foreach($tiposAyuda as $tipo_ayuda)
                        <option value="{{$tipo_ayuda->id}}">{{$tipo_ayuda->descripcion}}</option>
                    @endforeach

                </select>
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
                <select class="form-control" id="inputBeneficiario" name="id_beneficiario" value="{{old('id_beneficiario', $ayuda->id_beneficiario)}}" >
                    <option value="">Seleccionar un beneficiario</option>
                    @foreach($beneficiarios as $beneficiario)
                        <option value="{{$beneficiario->id_beneficiario}}">{{$beneficiario->nombre}}</option>
                    @endforeach

                </select>
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
                <select class="form-control" id="inputIglesia" name="id_iglesia" value="{{old('iglesia', $ayuda->id_iglesia)}}" >
                    <option value="">Seleccionar una iglesia</option>
                    @foreach($iglesias as $iglesia)
                        <option value="{{$iglesia->id}}">{{$iglesia->nombre}}</option>
                    @endforeach

                </select>
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