<div class="col-sm-12 col-md-12">
  <div class="form-group row">
      <label for="inputIglesia" class="col-sm-3 col-form-label">Nombre iglesia</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="nombre" value="{{ $iglesia->nombre  }}">
      </div>

      
    </div>
    <div class="form-group row">
      <label for="inputDireccion" class="col-sm-3 col-form-label">Dirección</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="direccion" value="{{ $iglesia->direccion }}">
      </div>
      
    </div>
    <div class="form-group row">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Teléfono</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="telefono" value="{{ $iglesia->telefono }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Arquidiocesis principal</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="arquidiocesis" value="{{ $iglesia->arquidiocesis }}">
      </div>
      
    </div>
    <div class="form-group row">
      <label for="inputUser" class="col-sm-3 col-form-label">Parroco asociado</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="user" value="{{ $iglesia->user }}">
      </div>   
      
    </div>

    <div class="form-group row">
      <label for="inputEstado" class="col-sm-3 col-form-label">Estado de la iglesia</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="estado" value="{{ $iglesia->estado }}">
      </div>
    

    </div>

    
  </div>