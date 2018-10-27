<template>
  <div class="form-group row">
    <label for="inputUser" class="col-sm-3 col-form-label">Parroco Asociado</label>  
    <div class="col-sm-6">      
        <select v-model="selected" name="user_id" class="form-control">          
          <input type="text" class="input">
          <option selected disabled>Seleccione un parroco</option>
          <option v-for="option in options" v-bind:value="option.value" :key="option.value">
            {{ option.text }}
          </option>
        </select>      
      
    </div>  
  </div>              
</template>

<script>
  export default
  {
   data() {
     return {
       selected: 'Seleccione un parroco',
       options: [         
       ]
     }
   },
   props: ['old'],
   created() {
     this.getUser();
     if(this.old.length === 0) {
       this.selected = 'Seleccione un parroco'
     } else {
       this.selected = this.old
     }
   },
   methods: {
     getUser() {
       var url = '/obtenerparrocos';
        axios.get(url).then(response => {
          response.data.forEach(obj => {
            this.options.push({ text: obj.name, value: obj.id })            
          });
          
        });
     }
   }
  }
</script>