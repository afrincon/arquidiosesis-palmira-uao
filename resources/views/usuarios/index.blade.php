@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10" align="center">
			<h1>Usuarios</h1>
		</div>
		
		<div class="col-2" align="left">
			<span class="glyphicon glyphicon-plus" aria-hidden="true">fg</span>
			
			<a class="btn btn-primary" href="{{ url('/usuarios/crear') }}">Crear usuario</a>
        </div>

        @include('usuarios.partials.table')
    </div>
</div>
@endsection
