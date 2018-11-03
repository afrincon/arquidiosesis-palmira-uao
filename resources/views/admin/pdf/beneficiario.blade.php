@extends('layouts.pdf')

@section('content')

<div class="container">
  <section class="hero">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
            Beneficiario: {{ $iglesia->nombre }}    
        </h1>      
      </div>    
      <br><br><br>
      <p>{{ Carbon\Carbon::now(new DateTimeZone('America/Bogota')) }}</p>
    </div>  
    
  </section>

  <div class="panel-block">
      <div class="notification is-success">
        <button class="delete"></button>
        {{ session('status') }}
      </div>
    </div>  
</div>

<br><br><br><br><br>
<section class="section">
  <table class="table is-bordered is-fullwidth">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Fecha</th>
          <th scope="col">Tipo de Ayuda</th>
          <th scope="col">Beneficiario</th>
          <th scope="col">Iglesia</th>
          <th scope="col">Observaciones</th>
        </tr>    
      </thead>
    <tbody>
    @foreach ($ayuda as $item)            
    <tr>
      <td>{{ $item->id_ayuda }}</td>
      <td>{{ $item->fecha_ayuda }} </td>
      <td>{{ $item->tipoAyuda->descripcion }}</td>
      <td>{{ $item->beneficiario->nombre }}</td>
      <td>{{ $item->iglesia->nombre }}</td>
      <td>{{ $item->observaciones }}</td>
    </tr>
    @endforeach
    </tbody>
  </table>    
</section>





      
  

  
@endsection