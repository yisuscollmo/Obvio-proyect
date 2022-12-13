<template>
    <div id="ventas">
        <div id="filtro">
            <div id="into_filtro">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        v-model="search" @keyup="filtrar()" id="busca">
                </form>

                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Filtrar
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" @click="get_ventas">todas</a></li>
                        <li><a class="dropdown-item" href="#" @click="filtrando(1)">en proceso</a></li>
                        <li><a class="dropdown-item" href="#"  @click="filtrando(2)">Terminadas</a></li>
                        <li><a class="dropdown-item" href="#"  @click="filtrando(3)">Entrega en proceso</a></li>
                        <li><a class="dropdown-item" href="#"  @click="filtrando(4)">Producto's entregado's</a></li>
                    </ul>
                </div>

                <!-- Button trigger modal crear -->
              
            </div>


        </div>
        <div id="container_ventas">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sale number</th>
                        <th scope="col">State</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody v-for="p in ventas_copia">
                    <tr>
                        <td>{{ p.sales_number }}</td>
                        <td>{{ p.state }}</td>
                        <td>{{ p.date }}</td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    
</template>
<style scoped>
@import url(/src\assets\styles\ventas.css);
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
        filtrando(s) {
            this.search=s;
            this.ventas_copia = this.ventas_list.filter(
                (p) =>
                    
                    (p.state.toString().indexOf(this.search.toString()) > -1) 
                    
            );
            this.search="";
        },
    },
};
</script>
