<template>
     <div id="usadmin">
        <div id="filtro">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model="search"
                    @keyup="filtrar()" id="busca">
            </form>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#employee" id="crea">
                <i class="bi bi-person-plus-fill" id="mas"></i>
            </button>
        </div>
        <div id="table_users">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="u in users_list_mostrar">
                        <td></td>
                        <td>
                            <figure class="figure">
                                <img src="..//assets/image/default.jpg" class="figure-img img-fluid rounded">
                            </figure>
                        </td>
                        <td>{{ u.name }}</td>
                        <td>{{ u.email }}</td>
                        <td>{{ u.roles_id }}</td>
                        <td>
                        <td> <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#ediventa">
                                <i class="bi bi-pencil-fill"></i>
                            </button></td>
                        <td> <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#eliventa">
                                <i class="bi bi-trash"></i>
                            </button></td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  
     <!-- Modal-crear -->
     <div class="modal fade" id="employee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
@import url(/src\assets\styles\usadmin.css);
</style>
<script>
export default {

    data() {
        return {
            users_list: [],
            users_list_mostrar: [],
            search: "",
            user: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                token: null,

                roles_id: 1,
            },
            user_edit: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                token: null,
                // roles_id: 1,
            },
            role: ['ajam', ' Client', ' Employee', ' Administrator']
        };
    },

    mounted() {

        this.get_users();

    },
    methods: {
        async get_users() {
            let response = await this.axios.get("/api/users");
            this.users_list = response.data;

            this.users_list_mostrar = this.users_list;
            this.users_list_mostrar.forEach(element => {
                console.log(element);

            });
        },
        async new_user() {

            console.log(this.user);

            let response = await this.axios.post("/api/users/", this.user);
            this.get_users();
            this.user = "";
        },
        edit_user(p) {

            this.user_edit = p;
            // console.log(this.articles_edit);
        },
        async update_user() {
            let id = this.user_edit.id;
            console.log(this.user_edit);
            console.log("Id: " + id);

            await this.axios.put("/api/users/" + id, this.user_edit);
            this.get_users()
            this.user_edit = "";
        },
        async borrar_user(id) {
            console.log(id);
            if (confirm('seguro de eliminar producto')) {
                await this.axios.delete('/api/users/' + id);
                // console.log('se borro(?)');
                this.get_users();
            }
        },
        filtrar() {
            this.users_list_mostrar = this.users_list.filter(
                (p) =>
                    (p.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
                    (p.roles_id.toString().toLowerCase().toString().indexOf(this.search.toLowerCase()) > -1)

            );
        },

    },


};
</script>