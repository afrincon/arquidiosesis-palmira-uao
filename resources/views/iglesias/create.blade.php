@extends('layouts.app')
@section('content')
<div class="card" style="width: 60rem; margin: 0 auto;">  
  <h3 class="card-title">Creación de iglesias</h3>
  <div class="card-body">
    <div class="col-sm-12">
      @include('errors.errors')
    </div>
    @if(Session::get('info'))
      <div class="alert alert-success" role="alert">
        {{ Session::get('info') }}
      </div>
    @endif
    <div class="col-sm-12">
      @include('iglesias.partials.formulario')
    </div>
  </div>
<div>
@endsection