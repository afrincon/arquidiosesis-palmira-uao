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
      <label for="inputDocumento" class="col-sm-3 col-form-label">Documento</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="documento" id="inputDireccion" placeholder="Ingrese el documento de identidad"  value="{{ old('documento') }}">
      </div>

      @if($errors->has('documento'))
        <span class="help-block">
          <strong>{{ $errors->first('documento') }}</strong>
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
    <div class="form-group row">
      <label for="inputUser" class="col-sm-3 col-form-label">Parroco asociado</label>
      <div class="col-sm-6">
        <select class="form-control" id="selectUser" name="user" value="{{ old('user') }}">
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



    <div class="form-group col-sm-12 col-md-8">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-primary" href="{{ url('/beneficiarios') }}" role="button">Salir</a>
    </div>
  </div>
</form>