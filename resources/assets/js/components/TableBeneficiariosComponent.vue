<template>
  <div id="crud" class="row">
    <input type="text" name="nombre" class="input" v-model="nombre" placeholder="Buscar beneficiario">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped is-fullwidth">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo de Documento</th>
            <th scope="col">Documento</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Dirección</th>
            <th scope="col">Clasificación</th>
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="beneficiario in beneficiarios" :key="beneficiario.id_beneficiario">            
              <td>{{ beneficiario.id_beneficiario }}</td>
              <td><a :href="'/beneficiarios/' + beneficiario.id_beneficiario">{{ beneficiario.nombre }}</a></td>
              <td>{{ beneficiario.tipo_documento.descripcion }}</td>
              <td>{{ beneficiario.documento }}</td>
              <td>{{ beneficiario.telefono }}</td>
              <td>{{ beneficiario.direccion }}</td>
              <td>{{ beneficiario.clasificacion }}</td>
              <td><a class="button is-link is-rounded is-outlined" :href="'/beneficiarios/' + beneficiario.id_beneficiario + '/editar'">Editar</a></td>
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
      beneficiarios: [],
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
    this.getBeneficiarios();
  },
  watch: {
    nombre(after,before) {
      this.getBeneficiarios();				
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
    getBeneficiarios(page) {
      var url = 'beneficiarios/obtenerlistadobeneficiarios?page='+page;                
      axios.get(url, { params: { nombre: this.nombre }}).then(response => {
        this.beneficiarios = response.data.beneficiarios.data;
        this.pagination = response.data.paginate; 
      });
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getBeneficiarios(page);
    }
  }
}
</script>

