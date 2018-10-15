@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Ayudas</h1>

            <br/>

            <div class="col-4">
                <a class="btn btn-primary" href="{{ url('/ayudas/crear') }}">Registrar ayuda</a>
            </div>

            @include('ayudas.partials.tablaAyuda')
        </div>
    </div>
@endsection