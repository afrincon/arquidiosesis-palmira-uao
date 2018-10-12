<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @forelse($usuarios as $usuario)
      <tr data-id="{{ $usuario->id }}">
        <td> {{ $usuario->id }}</td>
        <td> {{ $usuario->name }}</td>
        <td> {{ $usuario->email }}</td>
        <td> {{ $usuario->password }}</td>
        <td> {{ $usuario->estado }}</td>
        <td>
          <a class="btn btn-primary" href="{{ url("usuarios/{$usuario->id}/editar") }}">Editar</a>
        </td>
      </tr>
      @empty

      <td>No hay usuarios registrados</td>
    @endforelse
  </tbody>
</table>
