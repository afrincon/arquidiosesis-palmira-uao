<template>
  <div>
    <input type="text" class="input" list="data-parrocos" name="id_beneficiario" v-bind:id="this.value_id">
    <datalist id="data-parrocos" >
      <!--<select class="select">-->
        <option v-for="option in options"  v-bind:value="option.value" v-bind:label="option.text" v-bind:key="option.id">          
          
        </option>
      <!--</select>-->
        
    </datalist>
  </div>
</template>

<script>
export default {  
  data() {
    return {
      options : [],   
    }
  },
  props: ['value_id'],
  created() {
    this.obtenerParrocos();
  },
  watch: {
    user_id(after,before) {
      this.obtenerParrocos();
    }
  },
  methods: {
    obtenerParrocos(){
      var url = '/beneficiarios/obtenerlistadobeneficiarios'
      axios.get(url, { params: { user_id: this.user_id }}).then(response => {
        response.data.beneficiarios.data.forEach(obj => {
          this.options.push({ text: obj.nombre, value: obj.id_beneficiario })            
        });
      });
    }
  }
}
</script>

