@extends('layouts.app')
@section('content')
<div class="card" style="width: 60rem; margin: 0 auto;">  
  <h3 class="card-title">Creación de beneficiarios</h3>
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
    var bendir=$('#inputDireccion').val();
    $.ajax({
		url: "{{ url('beneficiarios/validar') }}", 
		dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
		method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
		data: {'direccion':bendir}, //parametros GET o POST
		success: function (data) {	
			console.log(data);
			if(data){
				swal({
			  title: "Hay un beneficiario registrado con la misma direccion!",
			  text: "¿desea registrar este beneficiario con la misma direccion?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
				$('inputDireccion').focus();
			  } else {
			  $('inputDireccion').focus();
			  }
			});
			$("#btnguardar").removeAttr("disabled");//habilita boton
			}
			$("#btnguardar").removeAttr("disabled");//habilita boton			
		}
	});
  }
</script>