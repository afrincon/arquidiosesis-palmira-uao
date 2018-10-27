@extends('layouts.pdf')

@section('content')
<table>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Fecha</th>
        <th scope="col">Tipo de Ayuda</th>
        <th scope="col">Identificaccion Beneficiario</th>
        <th scope="col">Nombre Beneficiario</th>
        <th scope="col">Iglesia</th>
        <th scope="col">Observaciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($ayudas as $ayuda)
     
        <tr>
          <td> {{ $ayuda->id_ayuda }}</td>
          <td> {{ $ayuda->fecha_ayuda }}</td>
          <td> {{ $ayuda->tipoAyuda->descripcion }}</td>
          <td> {{ $ayuda->beneficiario->documento }} </td>
          <td> {{ $ayuda->beneficiario->nombre }} </td>
          <td> {{ $ayuda->iglesia->nombre }} </td>
          <td> {{ $ayuda->observaciones }}</td>
          <
        </tr>
        @empty
  
        <td>No hay ayudas registradas</td>
      @endforelse
    </tbody>
  </table>
@endsection