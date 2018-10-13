<form method="post" action="{{ url('ayudas') }}" >
    {{ csrf_field() }}
    <div class="col-sm-12 col-md-12">

      <div class="form-group row">
        <label for="inputFecha" class="col-sm-3 col-form-label">Fecha de entrega</label>
        <div class="col-sm-9">
          {{ \Carbon\Carbon::now() }}
        </div>
      </div>
      <div class="form-group row">
        <label for="inputAyuda" class="col-sm-3 col-form-label">Tipo de ayuda</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="id_tipoayuda" id="inputAyuda" placeholder="Ingrese el tipo de ayuda " autofocus value="{{ old('id_tipoayuda') }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputBeneficiario" class="col-sm-3 col-form-label">Identificacion del beneficiario</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="id_beneficiario" id="inputBeneficiario" placeholder="Ingrese el numero de identificacion del beneficiario" autofocus value="{{ old('id_beneficiario') }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputIglesia" class="col-sm-3 col-form-label">Iglesia</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="id_iglesia" id="inputTelefono" placeholder="Ingrese la iglesia donde se entrego" autofocus value="{{ old('id_iglesia') }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputObservaciones" class="col-sm-3 col-form-label">Observaciones</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="observaciones" id="inputObservaciones" placeholder="Observaciones adicionales" autofocus value="{{ old('observaciones') }}">
        </div>
      </div>

      <div class="form-group col-sm-12 col-md-8">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a class="btn btn-primary" href="{{ url('/ayudas') }}" role="button">Salir</a>
      </div>

    </div>
  </form>