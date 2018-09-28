@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Iglesias</h1>

        <br/>

        <div class="col-4">
            <a class="btn btn-primary" href="{{ url('/iglesias/crear') }}">Crear iglesia</a>
        </div>

        @include('iglesias.partials.table')
    </div>
</div>
@endsection