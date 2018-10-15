@extends('layouts.app')

@section('content')
<div class="col-sm-12 col-md-12" align="center">
	<h1>Consulta beneficiario</h1>
</div>
<br>
<div class="col-sm-12 col-md-12">
  <div class="form-group row">
      <label for="inputBeneficiario" class="col-sm-3 col-form-label">Nombre beneficiario</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="nombre" value="{{ $beneficiario->nombre  }}" disabled>
      </div>
    </div>
    <div class="col-sm-12 col-md-12">
  <div class="form-group row">
      <label for="inputBeneficiario" class="col-sm-3 col-form-label">Apellido beneficiario</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="apellido" value="{{ $beneficiario->apellido  }}" disabled>
      </div>
    </div>

<div class="col-sm-12 col-md-12">
  <div class="form-group row">
      <label for="inputTipodocumento" class="col-sm-3 col-form-label">tipo documento</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="id_tipo_documento" value="{{ $beneficiario->id_tipo_documento  }}" disabled>
      </div>
    </div>

<div class="col-sm-12 col-md-12">
  <div class="form-group row">
      <label for="inputDocumento" class="col-sm-3 col-form-label">Documento</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="documento" value="{{ $beneficiario->documento  }}" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Telefono</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="telefono" value="{{ $beneficiario->telefono }}" disabled>
      </div>
      
    </div>
    
<div class="col-sm-12 col-md-12">
  <div class="form-group row">
      <label for="inputDireccion" class="col-sm-3 col-form-label">Direccion</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="direccion" value="{{ $beneficiario->direccion  }}" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEstado" class="col-sm-3 col-form-label">Estado</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="estado" value="{{ $beneficiario->estado }}" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputClasificacion" class="col-sm-3 col-form-label">Clasificacion</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="clasificacion" value="{{ $beneficiario->clasificacion }}" disabled>
      </div>
    </div>

	<div class="col-sm-12 col-md-12" align="center">
		<a class="btn btn-primary" href="{{ url('/beneficiarios') }}" role="button">Salir</a>
	</div>	
   </div>
</div>
@endsection