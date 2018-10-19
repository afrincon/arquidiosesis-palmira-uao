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
            <th scope="col">Dirección</th>  
            <th scope="col">Teléfono</th>
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="iglesia in iglesias">
            <td>{{ iglesia.id }}</td>            
            <td>{{ iglesia.nombre }}</td>
            <td>{{ iglesia.direccion }}</td>
            <td>{{ iglesia.telefono }}</td>
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
                iglesias: [],
                nombre: null,
            }
        },
        created() {
            this.getIglesias();
        },
        watch: {
            nombre(after,before) {
                console.log(this.nombre);
                this.getIglesias();
            }
        },
        methods: {
            getIglesias() {
                var url = 'informacion';                
                axios.get(url, { params: { nombre: this.nombre }}).then(response => {
                    this.iglesias = response.data;
                });
            }
        }
    }
</script>