<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Dirección</th>  
      <th scope="col">Teléfono</th>
      <th scope="col">Arquidiocesis principal</th>      
      <th scope="col">Parroco asociado</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @forelse($iglesias as $iglesia)
      <tr data-id="{{ $iglesia->id }}">
        <td> {{ $iglesia->id }}</td>
        <td><a href="{{ url("iglesias/{$iglesia->id}") }}"> {{ $iglesia->nombre }} </a></td>
        <td> {{ $iglesia->direccion }}</td>
        <td> {{ $iglesia->telefono }}</td>
        <td> {{ $iglesia->arquidiocesis }}</td>
        <td> {{ $iglesia->user }}</td>
        <td> {{ $iglesia->estado }}</td>
        <td>
          <a class="btn btn-primary" href="{{ url("iglesias/{$iglesia->id}/editar") }}">Editar</a>
        </td>
      </tr>
      @empty

      <td>No hay iglesias registradas</td>
    @endforelse
  </tbody>
</table>