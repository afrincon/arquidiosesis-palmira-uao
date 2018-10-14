<form method="post" action="{{ route('beneficiarios.update', $beneficiario->id) }}" >
@method('put')
{{ csrf_field() }}
    <div class="col-sm-12 col-md-12">
        <div class="form-group row">
            <label for="inputBeneficiario" class="col-sm-3 col-form-label">Nombre</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nombre" id="inputBeneficiario" autofocus value="{{ old('nombre') }}">
            </div>

            @if($errors->has('nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <label for="inputBeneficiario" class="col-sm-3 col-form-label">Apellido</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="apellido" id="inputBeneficiario" autofocus value="{{ old('apellido') }}">
            </div>

            @if($errors->has('apellido'))
                <span class="help-block">
          <strong>{{ $errors->first('apellido') }}</strong>
        </span>
            @endif
        </div>




        <div class="form-group col-sm-12 col-md-8">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-primary" href="{{ url('/beneficiarios') }}" role="button">Salir</a>
        </div>
    </div>
</form>