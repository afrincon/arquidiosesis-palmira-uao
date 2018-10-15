@extends('layouts.app')

@section('content')
<div class="container">   
    <div class="row principal">
        <h1>Opciones usuario</h1>
        <br/>
        <div class="col-sm-12">
        <a href="{{ url('/beneficiarios')}}" class="btn btn-primary btn-lg">Beneficiarios</a>
        </div>
        <br>
        <div class="col-sm-12">
        <a href="{{ url('/ayudas')}}" class="btn btn-primary btn-lg">Ayudas</a>
        </div>
    </div>
    <hr>
    <div class="row principal">
        <h1>Opciones administrador</h1>
        <br/>
        <div class="col-sm-12">
            <a href="{{ url('/usuarios')}}" class="btn btn-primary btn-lg">Usuarios</a>
        </div>
        <br>
        <div class="col-sm-12">
            <a href="{{ url('/iglesias')}}" class="btn btn-primary btn-lg">Iglesias</a>
        </div>
    </div>   
</div>
@endsection