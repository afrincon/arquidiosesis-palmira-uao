<form method="post" action="{{ url('iglesias') }}" >
  {{ csrf_field() }}
  <div class="col-sm-12 col-md-12">
    <div class="form-group row">
      <label for="inputIglesia" class="col-sm-3 col-form-label">Nombre iglesia</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="nombre" id="inputIglesia" placeholder="Ingrese el nombre de la igleia">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputDireccion" class="col-sm-3 col-form-label">Dirección</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="direccion" id="inputDireccion" placeholder="Ingrese la dirección de la igleia">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Teléfono</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="telefono" id="inputTelefono" placeholder="Ingrese el teléfono de la igleia">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputArquidiocesis" class="col-sm-3 col-form-label">Arquidiocesis principal</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="inputArquidiocesis" placeholder="Ingrese la arquidiocesis a la que pertenece la iglesia">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputUser" class="col-sm-3 col-form-label">Parroco asociado</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="inputUser" placeholder="Ingrese el parroco asociado de la igleia">
      </div>
    </div>

    <div class="form-group col-sm-12 col-md-8">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-primary" href="{{ url('/iglesias') }}" role="button">Salir</a>
    </div>
  </div>
</form>