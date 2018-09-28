<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Dirección</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($iglesias as $iglesia)
      <tr data-id="{{ $iglesia->id }}">
        <td> {{ $iglesia->id }}</td>
        <td> {{ $iglesia->nombre }}</td>
        <td> {{ $iglesia->direccion }}</td>
        <td> {{ $iglesia->telefono }}</td>
        <td>
          <a class="btn btn-primary" href="#">Editar</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>