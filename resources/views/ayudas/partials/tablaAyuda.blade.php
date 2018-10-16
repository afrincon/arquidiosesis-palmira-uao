<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Fecha</th>
        <th scope="col">Tipo de Ayuda</th>
        <th scope="col">Beneficiario</th>
        <th scope="col">Iglesia</th>
        <th scope="col">Observaciones</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($ayudas as $ayuda)
     
        <tr data-id="{{ $ayuda->id_ayuda }}">
          <td> {{ $ayuda->id_ayuda }}</td>
          <td> {{ $ayuda->fecha_ayuda }}</td>
          <td> {{ $ayuda->tipoAyuda->descripcion }}</td>
          <td> {{ $ayuda->beneficiario->documento }}</td>
          <td><a href="{{ url("iglesias/{$ayuda->iglesia->id}") }}"> {{ $ayuda->iglesia->nombre }} </a></td>
          <td> {{ $ayuda->observaciones }}</td>
          <td>
              <a class="btn btn-primary" href="{{ url("ayudas/{$ayuda->id_ayuda}/editar") }}">Editar</a>
          </td>
        </tr>
        @empty
  
        <td>No hay ayudas registradas</td>
      @endforelse
    </tbody>
  </table>
