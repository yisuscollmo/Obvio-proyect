<template>

    <div class="container_body">
        <div class="botones">
            <button type="button" id="boton" class="btn btn-outline-success link" data-bs-toggle="offcanvas"
                data-bs-target="#perfiladmin" aria-controls="offcanvasExample">
                <i class="bi bi-person-fill"></i>
            </button>
            <router-link to="/usadmin" type="button" id="boton" class="btn btn-outline-success link">
                <i class="bi bi-people-fill"></i>
            </router-link>
            <router-link to="/products" type="button" id="boton" class="btn btn-outline-success link"><i
                    class="bi bi-newspaper"></i>
            </router-link>
            <router-link to="/Ventas" type="button" id="boton" class="btn btn-outline-success link"><i
                    class="bi bi-stack"></i>
            </router-link>
            <router-link  to="images" type="button" id="boton" class="btn btn-outline-success link">
                <i class="bi bi-file-image-fill"></i>
            </router-link>
           

        </div>

        <!-- perfil -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="perfiladmin" aria-labelledby="offcanvasRightLabel">
          
            <div id="user_data">
                    <h1> My Profile</h1>
                    <img src="" alt="">
                    <h2>{{role[user.roles_id]}}</h2>
                    <p>Name: {{user.name}}</p>
                    <p>Email: {{user.email}}</p>
                    <p>created_at: {{ user.created_at }}</p>
                   
                    <button @click="logout()" class="btn btn-success ">Logout</button>
                </div>
        </div>
        <!-- <div id="user_data">
                    <h1> My Profile</h1>
                    <h2>{{role[user.roles_id]}}</h2>
                    <p>Name: {{user.name}}</p>
                    <p>Email: {{user.email}}</p>
                    <p>created_at: {{ user.created_at }}</p>
                   
                    <button @click="logout()">Logout</button>
                </div> -->

        <main>

            <router-view>

            </router-view>

        </main>
    </div>
</template>
<style scoped>
@import url(/src\assets\styles\admin.css);
</style>
<script>
export default {
    data() {
        return {
            token: null,

            user: {},
            user_edit: {},
            role: ['ajam', ' Client', ' Employee', ' Admin']
        };

    },
    mounted() {
        this.$router.push('/products');

        if (localStorage.token) {
            this.token = localStorage.token;
            this.user = JSON.parse(localStorage.user);
            console.log("Admin rol: "+ this.user.roles_id);
            if (this.user.roles_id === 3) {
                
                this.token = localStorage.token;
                this.user = JSON.parse(localStorage.user);
                // this.token = localStorage.token;
                // this.get_user();
            } else {
                this.token = "";
                this.user = "";

                this.$router.push({
                    name: "Login",
                    params: {
                        message: "No estas autorizado para acceder a esta cuenta"
                    },
                });
            }
        }
        else {
            this.$router.push({
                name: "Login",
                params: {
                    message: "No estas autorizado para acceder a esta cuenta"
                },
            });
        }


    },
    methods: {
        async logout() {
            try {
                console.log(this.token);
                const rs = await this.axios.get("/api/logout", {
                    headers: { Authorization: `Bearer ${this.token}` },
                });

                localStorage.clear();

                this.$router.push({
                    name: "Login",
                    params: {
                        message: rs.data.message,
                    },
                });
            } catch (e) {
                this.$router.push({
                    name: "Login",
                    params: {
                        message: e.response.data.message,
                    },
                });
            }
        },
    },
};

</script>

 