<template>
    <div class="form-group row">
        <label for="inputUser" class="col-sm-3 col-form-label">{{this.label}}</label>
        <div class="col-sm-6">
            <select v-model="selected" v-bind:name="this.propname" class="form-control" v-bind:id="this.value_id">
                <input type="text" class="input">
                <option selected disabled>Seleccione una iglesia</option>
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
                selected: 'Seleccione una iglesia',
                options: [
                ]
            }
        },
        props: ['old', 'url', 'label', 'propname', 'value_id'],
        created() {
            console.log(this.propname)
            this.getChurch();
            if(this.old.length === 0) {
                this.selected = 'Seleccione una iglesia'
            } else {
                this.selected = this.old
            }
        },
        methods: {
            getChurch() {
                axios.get(this.url).then(response => {
                    switch (this.url) {
                        case '/iglesias/informacion':
                            response.data.forEach(obj => {
                                this.options.push({ text: obj.nombre, value: obj.id })
                            });
                            break;
                        case '/obteneriglesias' :
                            response.data.forEach(obj => {
                                this.options.push({ text: obj.name, value: obj.id })
                            });
                    }
                });
            }
        }
    }
</script>