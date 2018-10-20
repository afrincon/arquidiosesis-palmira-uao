<template>  
  <div id="crud" class="row">
    <input type="text" name="nombre" class="form-control" v-model="nombre">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Teléfono</th>
			<th scope="col">Correo</th>  
			<th scope="col">Fecha nacimiento</th>  
			<th scope="col">Fecha ingreso</th>  
			<th scope="col">Estado</th>  
			<th scope="col">Perfil</th>  
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="usuario in usuarios">
            <td>{{ usuario.id }}</td>            
            <td>{{ usuario.name }}</td>
            <td>{{ usuario.telefono }}</td>
            <td>{{ usuario.email }}</td>
			<td>{{ usuario.fecha_nacimiento }}</td>
			<td>{{ usuario.fecha_ingreso }}</td>
			<td>{{ usuario.estado }}</td>
			<td>{{ roles.nombre }}</td>
            <td><a class="btn btn-primary" href="#">Editar</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>


<script>
    export default {
        data() {
            return {
                usuarios: [],
                nombre: null,
            }
        },
        created() {
            this.getUsuarios();
        },
        watch: {
            nombre(after,before) {
                console.log(this.nombre);
                this.getUsuarios();
            }
        },
        methods: {
            getUsuarios() {
                var url = 'informacion';                
                axios.get(url, { params: { nombre: this.nombre }}).then(response => {
                    this.usuarios = response.data;
                });
            }
        }
    }
</script>