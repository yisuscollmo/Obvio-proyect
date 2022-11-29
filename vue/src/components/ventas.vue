<template>

    <div id="ventas">
        <div id="filtro">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model="search"
                    @keyup="filtrar()" id="busca">
                <!-- Button trigger modal crear -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#creventa"
                    id="crea">
                    <i class="bi bi-folder-plus" id="mas"></i>
                </button>
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
                        <div>
                            <td> <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#ediventa">
                                    <i class="bi bi-pencil-fill"></i>
                                </button></td>
                            <td> <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#eliventa">
                                    <i class="bi bi-trash"></i>
                                </button></td>
                        </div>
                    </tr>

                </tbody>

            </table>
        </div>


    </div>
    <!-- Modal-eliminar -->
    <div class="modal fade" id="eliventa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>venta</h5>

                </div>
                <div class="modal-body">
                    estas seguro de elimar esta venta
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                    <button type="button" class="btn btn-danger">eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-editar -->
    <div class="modal fade" id="ediventa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Sale number:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Stat:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Data:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">edit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-crear -->
    <div class="modal fade" id="creventa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">create new sale</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Sale number:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Stat:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Data:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">edit</button>
                </div>
            </div>
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


    },


};
</script>