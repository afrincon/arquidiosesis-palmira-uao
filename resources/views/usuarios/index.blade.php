@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Usuarios</h1>

        <br/>

        <div class="col-4">
            <a class="btn btn-primary" href="{{ url('/usuarios/crear') }}">Crear iglesia</a>
        </div>

        @include('usuarios.partials.table')
    </div>
</div>
@endsection
