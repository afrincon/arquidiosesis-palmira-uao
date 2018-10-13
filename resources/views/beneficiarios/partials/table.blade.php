<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Tipo de Documento</th>
      <th scope="col">Documento</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Dirección</th>
      <th scope="col">Estado</th>
      <th scope="col">Clasificación</th>
    </tr>
  </thead>
  <tbody>
    @forelse($beneficiarios as $beneficiario)
      <tr data-id="{{ $beneficiario->id }}">
        <td> {{ $beneficiario->id }}</td>
        <td><a href="{{ url("beneficiarios/{$beneficiario->id}") }}"> {{ $beneficiario->nombre }} </a></td>
        <td> {{ $beneficiario->apellido }}</td>
        <td> {{ $beneficiario->id_tipo_documento }}</td>
        <td> {{ $beneficiario->documento }}</td>
        <td> {{ $beneficiario->telefono }}</td>
        <td> {{ $beneficiario->direccion }}</td>
        <td> {{ $beneficiario->estado }}</td>
        <td> {{ $beneficiario->clasificacion }}</td>
        <td>
          <a class="btn btn-primary" href="{{ url("beneficiarios/{$beneficiario->id}/editar") }}">Editar</a>
        </td>
      </tr>
      @empty

      <td>No hay beneficiarios registrados</td>
    @endforelse
  </tbody>
</table>