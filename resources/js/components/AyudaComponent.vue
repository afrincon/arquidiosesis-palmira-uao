<script src="../app.js"></script>
<template>
    <div id="crud" class="row">
        <input type="text" name="nombre" class="form-control" v-model="id_beneficiario">
        <br>
        <div class="col-md-12">
            <table class="table table-hover table-striped">
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
                <tr v-for="ayuda in ayudas">
                    <td>{{ ayuda.id_ayuda }}</td>
                    <td>{{ ayuda.fecha_ayuda }}</td>
                    <td>{{ ayuda.id_tipoayuda }}</td>
                    <td>{{ ayuda.id_beneficiario }}</td>
                    <td>{{ ayuda.id_iglesia }}</td>
                    <td>{{ ayuda.obsevaciones }}</td>
                    <td><a class="btn btn-primary" :href="ayuda.id_ayuda + '/editar'">Editar</a></td>
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
                ayudas: [],
                id_beneficiario: null,
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
        methods: {
            getAyudas() {
                var url = 'ayudas/informacion';
                axios.get(url, { params: { id_beneficiario: this.id_beneficiario }}).then(response => {
                    this.ayudas = response.data;
                });
            }
        }
    }
</script>