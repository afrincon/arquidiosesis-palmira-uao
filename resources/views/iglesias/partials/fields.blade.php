<form method="put" action="{{ url('iglesias.update') }}" >
{{ csrf_field() }}
  <div class="col-sm-12 col-md-12">
  <div class="form-group row">
      <label for="inputIglesia" class="col-sm-3 col-form-label">Nombre iglesia</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="nombre" id="inputIglesia" autofocus value="{{ $iglesia->nombre }}">
      </div>

      @if($errors->has('nombre'))
        <span class="help-block">
          <strong>{{ $errors->first('nombre') }}</strong>
        </span>
      @endif

    </div
  </div>
</form>