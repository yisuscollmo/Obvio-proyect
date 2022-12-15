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
                        <li><a class="dropdown-item btn btn-success " href="#" @click="get_ventas">todas</a></li>
                        <li><a class="dropdown-item btn btn-success " href="#" @click="filtrando(1)">en proceso</a></li>
                        <li><a class="dropdown-item btn btn-success " href="#" @click="filtrando(2)">Terminadas</a></li>
                        <li><a class="dropdown-item btn btn-success " href="#" @click="filtrando(3)">Entrega en
                                proceso</a></li>
                        <li><a class="dropdown-item btn btn-success " href="#" @click="filtrando(4)">Producto's
                                entregado's</a></li>
                    </ul>
                </div>

                <!-- Button trigger modal crear -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#creventa"
                    id="crea">
                    <i class="bi bi-folder-plus" id="mas"></i>
                </button>
            </div>


        </div>
        <div id="container_ventas">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sale number</th>
                        <th>articles</th>
                        <th scope="col">State</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody v-for="p in ventas_copia">
                    <tr>
                        <td>{{ p.sales_number }}</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" @click="get_details(p.id)">
                                    Articles
                                </a>

                                <ul class="dropdown-menu">
                                    <li v-for="d in sales_details"><a class="dropdown-item" href="#">{{ d.name }}</a>
                                    </li>

                                </ul>
                            </div>

                        </td>
                        <td>{{ p.state }}</td>
                        <td>{{ p.date }}</td>
                        <div>
                            <td> <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#ediventa" @click="edit_sale(p)">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#eliventa" @click="sale_borrar(p)">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </div>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" id="factura">
                                <i class="bi bi-journal-text"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">




                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-10 ">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <h1 class="h6 text-black">Factura</h1>

                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-10">
                                <h1 class="h6 text-black">Juan Manuel Murcia</h1>
                                <h1 class="h6 text-black">Vendedor</h1>
                            </div>
                            <div class="col-xs-2 text-center">
                                <strong>Fecha</strong>
                                <br>
                                2021-05-03 <br>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center" style="margin-bottom: 2rem;">
                            <div class="col-xs-6">
                                <h1 class="h2">Cliente</h1>
                                <strong>Andres felipe vargas</strong>
                            </div>
                            <div class="col-xs-6">
                                <h1 class="h2">Remitente</h1>
                                <strong>jesus alberto collazos</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <table class="table table-condensed table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                            <th>Precio unitario</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{ tablaProductos }}
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-right">Subtotal</td>
                                            <td>{{ subtotal }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">Descuento</td>
                                            <td>{{ descuento }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">Subtotal con descuento</td>
                                            <td>{{ subtotalConDescuento }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">Impuestos</td>
                                            <td>{{ impuestos }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">
                                                <h4>Total</h4>
                                            </td>
                                            <td>
                                                <h4>{{ total }}</h4>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <p class="h5">Gracias por su compra</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-eliminar -->
    <div class="modal fade" id="eliventa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-black">
                    <h5>{{ borrar }}</h5>
                </div>
                <div class="modal-body">
                    Estas seguro de elimar esta venta?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                    <button type="button" class="btn btn-danger" @click="delete_sale" data-bs-dismiss="modal"
                        @auxclick="delete_sale">eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-editar -->
    <div class="modal fade" id="ediventa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Edit Sale</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">User:</label>
                            <input type="text" class="form-control " id="recipient-name" v-model="sale_edit.users_id">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Date:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="sale_edit.date">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Number Sale</label>
                            <input type="text" class="form-control" id="recipient-name"
                                v-model="sale_edit.sales_number">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">State:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="sale_edit.state">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Total:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="sale_edit.total">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" @click="update_sale">Edit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-crear -->
    <div class="modal fade" id="creventa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel`">create new sale</h1>
                    <button type="button" class="btn-close text-black" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">User:</label>
                            <input type="text" class="form-control " id="recipient-name" v-model="sale.user_id">
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Escoge los articulos a vender
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><button class="dropdown-item" type="button">Action</button></li>

                            </ul>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Date:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="sale.date">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Number Sale</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="sale.sales_number">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">State:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="sale.state">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Total:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="sale.total">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" @click="new_sale"
                        data-bs-dismiss="modal">Create</button>
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
            sale_detail: {

            },
            sales_details: [],
            sale: {
                users_id: "",
                date: "",
                sales_number: "",
                state: "",
                total: "",
            },
            sale_edit: {},
            borrar: "",
            idelete: "",
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
        async new_sale() {
            // console.log('sale:'+ JSON.stringify(this.sale));
            let response = await this.axios.post("/api/sales/", this.sale);
            console.log("response: " + response.data);
            this.get_ventas();
            this.sale = "";
        },
        edit_sale(p) {
            this.sale_edit = p;
        },
        async update_sale() {
            let id = this.sale_edit.id;
            let response = await this.axios.put("/api/sales/", this.sale_edit + id);
        },
        sale_borrar(p) {
            this.borrar = p.sales_number;
            this.idelete = p.id;
        },
        async delete_sale() {
            let id = this.idelete;
            console.log('id: ' + id)
            let response = await this.axios.delete("/api/sales/" + id);
            this.get_ventas();
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
            this.search = s;
            this.ventas_copia = this.ventas_list.filter(
                (p) =>

                    (p.state.toString().indexOf(this.search.toString()) > -1)

            );
            this.search = "";
        },
        async get_details(id) {
            let response = await this.axios.get("/api/sales_details/" + id);
            this.sales_details = response.data;
            // console.log('articles: '+this.sales_details);
        },
    },
};
</script>