@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-10" align="center">
			<h1>Beneficiarios</h1>
		</div>
		
		<div class="form-group row">
			<div class="col-sm-2 col-md-2" align="left">
				<a class="btn btn-primary" href="{{ url('/beneficiarios/crear') }}">Crear</a>
			</div>
		</div>
		
        <beneficiario></beneficiario>
    </div>
</div>
@endsection