<template>  
  <div id="crud" class="row">
    <input type="text" name="name" class="form-control" v-model="name">
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
          <tr v-for="usuario in usuarios" :key="usuario.id">		  
            <td>{{ usuario.id }}</td>            
            <td><a :href="'/usuarios/' + usuario.id">{{ usuario.name }}</a></td>
            <td>{{ usuario.telefono }}</td>
            <td>{{ usuario.email }}</td>
			<td>{{ usuario.fecha_nacimiento }}</td>
			<td>{{ usuario.fecha_ingreso }}</td>
			<td>{{ usuario.estado }}</td>
			<td>{{ usuario.roles[0].nombre }}</td>
            <td><a class="btn btn-primary" :href="'/usuarios/' + usuario.id + '/editar'">Editar</a></td>
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
                name: null,
            }
        },
        created() {
            this.getUsuarios();
        },
        watch: {
            name(after,before) {
                console.log(this.name);
                this.getUsuarios();				
            }
        },
        methods: {
            getUsuarios() {
                var url = 'usuarios/informacion';                
                axios.get(url, { params: { name: this.name }}).then(response => {
                    this.usuarios = response.data;
					console.log(this.usuarios)
					var array = this.usuarios;
					console.log(array[0].roles[0].nombre)
                });
            }
        }
    }
</script>