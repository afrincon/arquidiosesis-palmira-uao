@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="form-group row col-sm-12">
        <label for="inputIglesia" class="col-sm-3 col-form-label">Nombre iglesia</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="nombre" value="{{ $iglesia->nombre  }}" disabled>
        </div>
      </div>
        <div class="form-group row  col-sm-12">
          <label for="inputDireccion" class="col-sm-3 col-form-label">Dirección</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="direccion" value="{{ $iglesia->direccion }}" disabled>
          </div>      
        </div>
    <div class="form-group row  col-sm-12">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Teléfono</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="telefono" value="{{ $iglesia->telefono }}" disabled>
      </div>
    </div>
    <div class="form-group row  col-sm-12">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Arquidiocesis principal</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="arquidiocesis" value="{{ $iglesia->arquidiocesis }}" disabled>
      </div>
      
    </div>
    <div class="form-group row  col-sm-12">
      <label for="inputUser" class="col-sm-3 col-form-label">Parroco asociado</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="user" value="{{ $iglesia->user->name }}" disabled>
      </div>   
      
    </div>

    <div class="form-group row  col-sm-12">
      <label for="inputEstado" class="col-sm-3 col-form-label">Estado de la iglesia</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="estado" value="{{ $iglesia->estado }}" disabled>
      </div>
    

    </div>

    <div class="form-group row ">
      <div class="col-sm-12">
            <a href="{{ url('/iglesias') }}" class="btn btn-primary">Regresar</a>
        </div>
    </div>

        
      </div>
</div>
<div class="row justify-content-center">
<div class="col-sm-12 col-md-12">
  
    
   
  </div>
  </div>
@endsection