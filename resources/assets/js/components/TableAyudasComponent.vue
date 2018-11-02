<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="id_beneficiario" placeholder="Buscar beneficiario">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped table is-fullwidth">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha</th>
            <th scope="col">Tipo de Ayuda</th>
            <th scope="col">Beneficiario</th>
            <th scope="col">Iglesia</th>
            <th scope="col">Observaciones</th> 
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="ayuda in ayudas" :key="ayuda.id_ayuda">                        
            <td>{{ ayuda.id_ayuda }}</td>
            <td>{{ ayuda.fecha_ayuda }}</td>
            <td>{{ ayuda.tipo_ayuda.descripcion }}</td>
            <td>{{ ayuda.beneficiario.nombre }}</td>
            <td>{{ ayuda.iglesia.nombre }}</td>
            <td>{{ ayuda.observaciones }}</td>
            <td>
              <a class="button is-link is-rounded is-outlined" :href="'/ayudas/' + ayuda.id_ayuda + '/editar'">Editar</a>
              <a class="button is-danger is-rounded is-outlined" v-on:click='deleteEntry(ayuda)'>Anular</a>
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
      ayudas: [],
      id_beneficiario: null,
      pagination: {
        'current_page' : 0,
        'per_page' : 0,
        'first_item':  0,
        'last_item': 0,
        'last_page': 0,                    
        'total': 0,
      },
      offset: 3,
    }
  },
  created() {
    this.getAyudas();
  },
  watch: {
    id_beneficiario(after,before) {
        this.getAyudas();
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
    getAyudas(page) {
      var url = '/ayudas/obtenerlistadoayudas?page='+page;
      axios.get(url, { params: { id_beneficiario: this.id_beneficiario }}).then(response => {
        this.ayudas = response.data.ayudas.data;
        this.pagination = response.data.paginate;
      });
    },
    deleteEntry: function(ayuda){
      window.swal({
        title: "Advertencia!",
        text: "¿Desea anular esta ayuda?",
        icon: "warning",
        buttons: ["Volver", "Continuar"],
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
            axios.delete('ayudas/' + ayuda.id_ayuda)
              .then(response => {
                if(response.status === 200){
                  window.swal("Ayuda anulada correctamente");                  
                }
            })
            .catch(error => {
                window.swal("Error al anular el documento");
            });
          } 
      });
      
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getAyudas(page);
    }
  }
}
</script>

