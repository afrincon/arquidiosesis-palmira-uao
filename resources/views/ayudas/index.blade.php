@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center principal">
        <div class="row">
            <div class="col-sm-8">
                <h1 class="title">Ayudas</h1>
            </div>
            <div class="col-4">
                <a class="btn btn-primary" href="{{ url('/ayudas/crear') }}">Registrar ayuda</a>
                <a href="{{ route('ayudas.pdf') }}" class="btn btn-sm btn-primary">
                    Descargar ayudas en PDF
                </a>
            </div>

            <table-ayuda></table-ayuda>
        </div>
    </div>
</div>
@endsection