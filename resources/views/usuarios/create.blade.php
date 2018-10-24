@extends('layouts.app')
@section('content')
<div class="card" style="width: 60rem; margin: 0 auto;">  
  <h3 class="card-title">Creación de usuarios</h3>
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
      @include('usuarios.partials.formulario')
    </div>
  </div>
<div>
@endsection

<script>
	function valfecnaci(){
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
		//if ()
		//var fecNaci = document.getElementById("fecha_nacimiento").value;
		//alert(fecNaci);
		alert(dd+'/'+mm+'/'+yyyy);
	}
</script>