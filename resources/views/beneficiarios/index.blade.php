@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-sm-8">
                <h1 class="title">Beneficiarios</h1>
            </div>
            <div class="col-4">
                <a class="btn btn-primary" href="{{ url('/beneficiarios/crear') }}">Crear beneficiario</a>
            </div>
        </div>

        <beneficiario></beneficiario>

        @include('beneficiarios.partials.table')
    </div>
</div>
@endsection