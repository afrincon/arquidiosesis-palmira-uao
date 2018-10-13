@extends('layouts.app')

@section('content')
<div class="col-sm-12 col-md-12" align="center">
	<h1>Consulta usuario</h1>
</div>
<br>
<div class="col-sm-12 col-md-12">
  <div class="form-group row">
      <label for="inputUsuario" class="col-sm-3 col-form-label">Nombre usuario</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="name" value="{{ $usuario->name  }}" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail" class="col-sm-3 col-form-label">Correo</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="email" value="{{ $usuario->email }}" disabled>
      </div>
      
    </div>
    <div class="form-group row">
      <label for="inputEstado" class="col-sm-3 col-form-label">Estado</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="estado" value="{{ $usuario->estado }}" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPerfil" class="col-sm-3 col-form-label">Perfil</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="perfil" value="{{ $usuario->perfil }}" disabled>
      </div>
    </div>	
	<div class="col-sm-12 col-md-12" align="center">
		<a class="btn btn-primary" href="{{ url('/usuarios') }}" role="button">Salir</a>
	</div>	
   </div>
</div>
@endsection