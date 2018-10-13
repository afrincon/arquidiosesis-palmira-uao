<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Dirección</th>  
      <th scope="col">Teléfono</th>
      <th scope="col">Arquidiocesis principal</th>
      <th scope="col">Acciones</th>
      <th scope="col">Parroco asociado</th>
    </tr>
  </thead>
  <tbody>
    @forelse($iglesias as $iglesia)
      <tr data-id="{{ $iglesia->id }}">
        <td> {{ $iglesia->id }}</td>
        <td> {{ $iglesia->nombre }}</td>
        <td> {{ $iglesia->direccion }}</td>
        <td> {{ $iglesia->telefono }}</td>
        <td> {{ $iglesia->arquidiocesis }}</td>
        <td>
          <a class="btn btn-primary" href="#">Editar</a>
        </td>
      </tr>
      @empty

      <td>No hay beneficiarios registrados</td>
    @endforelse
  </tbody>
</table>