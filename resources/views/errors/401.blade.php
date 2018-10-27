@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row principal">
        <div class="col-sm-12">
            <h1>No se encuentra autorizado para ingresar a esta opción</h1>
        </div>
        <div class="col-sm-12">
            <a href="{{ url('/') }}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
</div>
@endsection