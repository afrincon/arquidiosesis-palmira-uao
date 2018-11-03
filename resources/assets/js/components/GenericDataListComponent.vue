<template>
  <div>
    <input type="text" class="input" list="data-parrocos" name="user_id">
    <datalist id="data-parrocos" >
      <!--<select class="select">-->
        <option v-for="parroco in parrocos"  v-bind:value="parroco.value" v-bind:label="parroco.text" v-bind:key="parroco.id">          
          
        </option>
      <!--</select>-->
        
    </datalist>
  </div>
</template>

<script>
export default {  
  data() {
    return {
      parrocos : [],   
    }
  },
  props: ['old'],
  created() {
    this.obtenerParrocos();
    if(this.old.length === 0) {
       this.selected = 'Seleccione una opción'
     } else {
       this.selected = this.old
     }
  },
  watch: {
    user_id(after,before) {
      this.obtenerParrocos();
    }
  },
  methods: {
    obtenerParrocos(){
      var url = '/usuarios/obtenerlistadoparrocos'
      axios.get(url, { params: { user_id: this.user_id }}).then(response => {
        response.data.forEach(obj => {
          this.parrocos.push({ text: obj.name, value: obj.id })            
        });
      });
    }
  }
}
</script>

