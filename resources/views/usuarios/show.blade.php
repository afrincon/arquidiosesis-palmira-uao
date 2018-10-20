@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-sm-12 col-md-12" align="center">
	<h1>Consulta usuario</h1>
	<br>
</div>
<div class="col-sm-2 col-md-2">
</div>
<div class="col-sm-8 col-md-8">
  <div class="form-group row">
      <label for="inputUsuario" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="name" value="{{ $User->name  }}" disabled>
      </div>
   </div>
   
  <div class="form-group row">
      <label for="inputTelefono" class="col-sm-3 col-form-label">Telefono</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="telefono" value="{{ $User->telefono  }}" disabled>
      </div>
   </div>   
   
    <div class="form-group row">
      <label for="inputEmail" class="col-sm-3 col-form-label">Correo</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="email" value="{{ $User->email }}" disabled>
      </div>
      
    </div>
	
  <div class="form-group row">
      <label for="inputFecnaci" class="col-sm-3 col-form-label">Fecha nacimiento</label>
      <div class="col-sm-6">
        <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $User->fecha_nacimiento  }}" disabled>
      </div>
   </div> 	
   
  <div class="form-group row">
      <label for="inputFecingre" class="col-sm-3 col-form-label">Fecha ingreso</label>
      <div class="col-sm-6">
        <input type="date" class="form-control" name="fecha_ingreso" value="{{ $User->fecha_ingreso  }}" disabled>
      </div>
   </div> 
   
    <div class="form-group row">
      <label for="inputEstado" class="col-sm-3 col-form-label">Estado</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="estado" value="{{ $User->estado }}" disabled>
      </div>
    </div>
	
    <div class="form-group row">
      <label for="inputPerfil" class="col-sm-3 col-form-label">Perfil</label>
      <div class="col-sm-6">
		@foreach($User->roles as $roles)
        <input type="text" class="form-control" name="perfil" value="{{ $roles->nombre }}" disabled>
		@endforeach
      </div>
    </div>	
	
	<div class="col-sm-8 col-md-8" align="center">
		<a class="btn btn-primary" href="{{ url('/usuarios') }}" role="button">Salir</a>
	</div>	
</div>
</div>
</div>
@endsection