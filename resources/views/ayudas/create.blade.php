@extends('layouts.app')
@section('content')
    <div class="card" style="width: 60rem; margin: 0 auto;">
        <h3 class="card-title">Registro de ayuda</h3>
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
                @include('ayudas.partials.registroAyuda')
            </div>
        </div>
    </div>
@endsection
<!--Creacion de registros-->

<script>
	function ValidError(){
		var beneid = $("#beneficiario").val();
		
		if(beneid === ""){
			swal("Debe seleccionar un beneficiario!", "", "error");	
			$('.swal-button--confirm').click(function(){
				$("#btnguardar").attr("disabled");//desabilita boton
				$("#inputBeneficiario").focus();
			});		
		}else{		
			$.ajax({
				url: "{{ url('ayudas/validar') }}", 
				dataType:'json',  // tipo de datos que te envia el archivo que se ejecuto                              
				method: "GET", // metodo por el cual vas a enviar los parametros GET o POST
				data: {'id_beneficiario':beneid}, //parametros GET o POST
				success: function (data) {	
					console.log(data)
					if($.trim(data)){
						swal("La ultima ayuda del beneficiario fue en: "+data.fecha_ayuda, "", "warning");	
						$('.swal-button--confirm').click(function(){
							$("#inputBeneficiario").focus();
						});	
						$("#btnguardar").removeAttr("disabled");//habilita boton
					}
				}
			});
		}
	}
</script>