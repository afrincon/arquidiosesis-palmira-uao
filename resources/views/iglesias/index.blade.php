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
        
        <div class="row">
            <form action="" method="get">
                <label class="sr-only" for="inLineName">Name</label>
                <input type="text" class="form-control"  id="inLineName" name="nombre"  placeholder="Nombre de la iglesia">            

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        @include('iglesias.partials.table')
        
    </div>

    {{ $iglesias->links() }}
</div>
@endsection