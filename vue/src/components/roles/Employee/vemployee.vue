<template>
    <div id="vemployee">
        <div id="filtro">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" 
                @change="filtrar()" aria-label="Search" id="busca">
            </form>
        </div>
        <div id="container_ventas">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sale number</th>
                        <th scope="col">State</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody v-for="p in ventas_copia">
                    <tr>

                        <td>{{p.sales_number}}</td>
                        <td>{{p.state}}</td>
                        <td>{{p.date}}</td>
                      


                    </tr>

                </tbody>

            </table>
        </div>
    </div>
</template>
<style scoped>
@import url(/src\assets\styles\vemployee.css);
</style>
<script>
export default {
    data() {
        return {
            ventas_list: [],
            ventas_copia: "",
            search: "",

        };


    },
    mounted() {
        this.get_ventas();
    },
    methods: {

        async get_ventas() {
            let response = await this.axios.get("/api/sales/")
            this.ventas_list = response.data;
            this.ventas_copia = this.ventas_list;

        },

        filtrar() {

            this.ventas_copia = this.ventas_list.filter(
                (p) =>
                    (p.sales_number.toString().toLowerCase().indexOf(this.search.toString()) > -1) ||
                    (p.state.toString().toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
                    (p.date.toString().toLowerCase().indexOf(this.search.toLowerCase()) > -1) 

            );
        },


    },


};
</script>
