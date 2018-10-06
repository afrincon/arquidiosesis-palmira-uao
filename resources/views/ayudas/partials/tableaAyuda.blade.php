<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Dirección</th>  
        <th scope="col">Teléfono</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($ayudas as $ayuda)
        <tr data-id="{{ $ayuda->id }}">
          <td> {{ $ayuda->id }}</td>
          <td> {{ $ayuda->nombre }}</td>
          <td> {{ $ayuda->direccion }}</td>
          <td> {{ $ayuda->telefono }}</td>
          <td>
            <a class="btn btn-primary" href="#">Editar</a>
          </td>
        </tr>
        @empty
  
        <td>No hay ayudas registradas</td>
      @endforelse
    </tbody>
  </table>