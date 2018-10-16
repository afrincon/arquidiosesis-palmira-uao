@extends('layouts.app')

@section('content')
<div class="col-sm-12 col-md-12">
  <div class="form-group row">
      <label for="inputIglesia" class="col-sm-3 col-form-label">Fecha de entrega</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="nombre" value="{{ $ayuda->fecha_ayuda  }}" disabled>
      </div>

      
    </div>
    <div class="form-group row">
      <label for="inputDireccion" class="col-sm-3 col-form-label">Tipo de ayuda</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="direccion" value="{{ $ayuda->tipo_ayuda }}" disabled>
      </div>
      
    </div>
    <div class="form-group row">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Identificacion del beneficiario</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="telefono" value="{{ $ayuda->id_beneficiario }}" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Iglesia</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="arquidiocesis" value="{{ $ayuda->iglesia }}" disabled>
      </div>
      
    </div>
    <div class="form-group row">
      <label for="inputUser" class="col-sm-3 col-form-label">Observaciones</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="user" value="{{ $ayuda->observaciones }}" disabled>
      </div>   
      
    </div>
      <div class="form-group col-sm-12 col-md-8">
        <a class="btn btn-primary" href="{{ url('/ayudas') }}" role="button">Salir</a>
      </div>

    </div>

    
  </div>
@endsection