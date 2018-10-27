<template>
  <div class="form-group row">
    <label for="inputUser" class="col-sm-3 col-form-label">{{this.label}}</label>  
    <div class="col-sm-6">      
        <select v-model="selected" v-bind:name="this.propname" class="form-control">          
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
   props: ['old', 'url', 'label', 'propname'],
   created() {
     console.log(this.propname)
     this.getUser();
     if(this.old.length === 0) {
       this.selected = 'Seleccione un parroco'
     } else {
       this.selected = this.old
     }
   },
   methods: {
     getUser() {
        axios.get(this.url).then(response => {
          switch (this.url) {
            case '/beneficiarios/informacion':
              response.data.forEach(obj => {
                this.options.push({ text: obj.nombre, value: obj.id_beneficiario })            
              });
              break;
            case '/obtenerparrocos' :
              response.data.forEach(obj => {
              this.options.push({ text: obj.name, value: obj.id })            
              });
          }          
        });
     }
   }
  }
</script>