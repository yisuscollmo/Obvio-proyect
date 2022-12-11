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
                        <th></th>
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
                                <img :src="axios.defaults.baseURL + u.image" class="figure-img img-fluid">
                            </figure>
                        </td>
                        <td>{{ u.name }}</td>
                        <td>{{ u.email }}</td>
                        <td>{{ u.roles_id }}</td>
                        <td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#editemployee" @click="edit_user(u)">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delemployee" @click="eliminar(u)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
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
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Create New Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Name:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="employee.name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Email:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="employee.email">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Password:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="employee.password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                        @click="new_user">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-Editar -->
    <div class="modal fade" id="editemployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Edit Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Name:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="employee_edit.name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Email:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="employee_edit.email">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label text-black">Password:</label>
                            <input type="text" class="form-control" id="recipient-name"
                                v-model="employee_edit.password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                        @click="update_user">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-delete -->
    <div class="modal fade" id="delemployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">{{ emplodel }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>seguro de eliminar este Employee?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                        @click="delete_user">Delete</button>
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
            idelete: "",
            employee: {
                name: "",
                email: "",
                password: "",
                // password_confirmation: "",
                token: null,
                roles_id: "",
                image: "",
            },
            emplodel: "",
            employee_edit: {},
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
            // this.users_list_mostrar.forEach(element => {
            //     console.log(element);

            // });
          
        },
        async new_user() {

            console.log(this.user);

            let response = await this.axios.post("/api/users/", this.employee);
            this.get_users();
            this.user = "";
        },
        edit_user(p) {

            this.employee_edit = p;
            // console.log(this.articles_edit);
        },
        async update_user() {
            let id = this.employee_edit.id;
            console.log(this.user_edit);
            console.log("Id: " + id);

            await this.axios.put("/api/users/" + id, this.employee_edit);
            this.get_users()
            this.user_edit = "";
        },
        eliminar(u) {
            this.emplodel = u.name;
            this.idelete = u.id;
            console.log('a borra: ' + this.idelete);
        },
        async delete_user() {

            let id = this.idelete;
            console.log(id);
            if (confirm('seguro de eliminar producto')) {
                await this.axios.delete('/api/users/' + id);
                // console.log('se borro(?)');
                this.get_users();
                this.produlete = null
            }
        },
        // filtrar_employees() {
        //     this.search = 2;
        //     this.users_list_mostrar = this.users_list.filter(
        //         (p) =>

        //             (p.roles_id.toString().indexOf(this.search.toString()) > -1)

        //     );
        //     this.search = "";
        // },

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