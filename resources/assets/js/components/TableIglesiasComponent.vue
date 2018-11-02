<template>
  <div id="crud" class="row">
    <input type="text" name="nombre" class="input" v-model="nombre" placeholder="Buscar iglesia">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped is-fullwidth">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Telefóno</th>
            <th>Arquidiocesis</th>
            <th>Parroco</th>
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="iglesia in iglesias" :key="iglesia.id">            
            <td>{{ iglesia.id }}</td>
            <td><a :href="'/iglesias/' + iglesia.id">{{ iglesia.nombre }}</a></td>
            <td>{{ iglesia.direccion}}</td>
            <td>{{ iglesia.telefono}}</td>
            <td>{{ iglesia.arquidiocesis.nombre }}</td>
            <td>{{ iglesia.user.name }}</td>
            <td>
                <a class="button is-link is-rounded is-outlined" :href="'/iglesias/'+iglesia.id + '/editar'">Editar</a>                
            </td>
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
      iglesias: [],
      pagination: {
        'current_page' : 0,
        'per_page' : 0,
        'first_item':  0,
        'last_item': 0,
        'last_page': 0,                    
        'total': 0,
      },
      nombre: null,
      offset: 3,
    }
  },
  created() {
    this.getIglesias();
  },
  watch: {
    nombre(after,before) {
      this.getIglesias();				
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
    getIglesias(page) {
      var url = '/iglesias/obtenerlistadoiglesias?page='+page;                
      axios.get(url, { params: { nombre: this.nombre }}).then(response => {
        this.iglesias = response.data.iglesias.data;
        this.pagination = response.data.paginate;        
      });
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getIglesias(page);
    }
  }
}
</script>

