@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Beneficiarios</h1>

        <br/>

        <div class="col-4">
            <a class="btn btn-primary" href="{{ url('/beneficiarios/crear') }}" >Crear beneficiario</a>

        </div>

        @include('beneficiarios.partials.table')
    </div>
</div>



@endsection