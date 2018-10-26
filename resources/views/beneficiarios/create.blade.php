@extends('layouts.app')
@section('content')
<div class="card" style="width: 60rem; margin: 0 auto;">  
  <h3 class="card-title">Creación de Beneficiarios</h3>
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
      @include('beneficiarios.partials.formulario')
    </div>
  </div>
<div>
@endsection
<script>  
	function msgedit(){
    swal({
      title: "Hay un beneficiario registrado con la misma direccion!",
      text: "¿desea registrar este beneficiario con la misma direccion?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      window.location.href = "{{ url('/beneficiarios/crear') }}"
      } else {
      $('inputDireccion').focus();
      }
    });
  }
</script>