@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center principal">
        <div class="row">
            <div class="col-sm-8">
                <h1 class="title">Iglesias</h1>
            </div>
            <div class="col-sm-4">
                <a class="btn btn-primary" href="{{ url('/iglesias/crear') }}">Crear iglesia</a>
            </div>
        </div>
        
        <iglesia></iglesia>        
    </div>
</div>
@endsection