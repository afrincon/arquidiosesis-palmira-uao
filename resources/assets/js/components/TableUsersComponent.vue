<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar usuario">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped table is-fullwidth">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>  
            <th scope="col">Fecha nacimiento</th>  
            <th scope="col">Fecha ingreso</th>
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
            <td>{{ usuario.roles[0].description }}</td>
            <td><a class="button is-link is-rounded is-outlined" :href="'/usuarios/' + usuario.id + '/editar'">Editar</a></td>
          </tr>
        </tbody>
      </table>
      <nav class="pagination" role="navigation" aria-label="pagination">
        <a class="pagination-previous" v-if="pagination.current_page > 1" @click.prevent="changePage(pagination.current_page - 1)" >Anterior</a>
        <a class="pagination-next" v-if="pagination.current_page < pagination.last_page" @click.prevent="changePage(pagination.current_page + 1)">Siguiente</a>
        <ul class="pagination-list">
          <li v-for="page in pagesNumber" :key="page">
            <a class="pagination-link" @click.prevent="changePage(page)" aria-label="Goto page 1" v-bind:class="[ page == isActived ? 'is-current' : '']">
              {{ page }}
            </a>
          </li>          
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      usuarios: [],
      pagination: {
        'current_page' : 0,
        'per_page' : 0,
        'first_item':  0,
        'last_item': 0,
        'last_page': 0,                    
        'total': 0,
      },
      name: null,
    }
  },
  created() {
    this.getUsuarios();
  },
  watch: {
    name(after,before) {
      this.getUsuarios();				
    }
  },
  computed:  {
    isActived: function() {
      return this.pagination.current_page;
    },
    pagesNumber: function() {
      if(!this.pagination.to){
        return [];
      }
      var from = this.pagination.current_page - this.offset;
      if( from < 1){
        from = 1;
      }

      var to = from + (this.offset * 2);
      if(to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }

      var pagesArray = [];
      while( from <= to ){
        pagesArray.push(from);
        from++;
      }

      return pagesArray;
    },
  },
  methods: {
    getUsuarios(page) {
      var url = '/usuarios/obtenerlistadousuarios?page='+page;                
      axios.get(url, { params: { name: this.name }}).then(response => {
        this.usuarios = response.data.usuarios.data;
        this.pagination = response.data.paginate;
      });
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getUsuarios(page);
    }
  }
}
</script>

