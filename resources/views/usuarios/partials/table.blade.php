<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
	  <th scope="col">Telefono</th>
      <th scope="col">Correo</th>
	  <th scope="col">Fecha nacimiento</th>
	  <th scope="col">Fecha ingreso</th>
      <th scope="col">Estado</th>
	  <th scope="col">Perfil</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @forelse($usuarios as $usuario)
      <tr data-id="{{ $usuario->id }}">
        <td> {{ $usuario->id }}</td>
        <td><a href="{{ url("usuarios/{$usuario->id}") }}"> {{ $usuario->name }} </a></td>		
		<td> {{ $usuario->telefono }}</td>
        <td> {{ $usuario->email }}</td>
		<td> {{ $usuario->fecha_nacimiento }}</td>
        <td> {{ $usuario->fecha_ingreso }}</td>
		<td> {{ $usuario->estado }}</td>
    @foreach($usuario->roles as $roles)
    <td> {{ $roles->nombre }}</td>
    @endforeach		
        <td>
          <a class="btn btn-primary" href="{{ url("usuarios/{$usuario->id}/editar") }}">Editar</a>
        </td>
      </tr>
      @empty

      <td>No hay usuarios registrados</td>
    @endforelse
  </tbody>
</table>
