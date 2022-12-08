<template>
    <div class="container_body">
        <div class="botones">
            <button type="button" id="boton" class="btn btn-outline-success link" data-bs-toggle="offcanvas"
                data-bs-target="#perfilusu" aria-controls="offcanvasExample">
                <i class="bi bi-person-fill"></i>
            </button>
            <router-link to="/pclient" type="button" id="boton" class="btn btn-outline-success link"><i
                    class="bi bi-newspaper"></i>
            </router-link>
            <router-link to="/clientbuys" type="button" id="boton" class="btn btn-outline-success link">
                <i class="bi bi-cart-check-fill"></i>
            </router-link>



        </div>
        <!-- perfil -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="perfilusu" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
                    id="boton_cerrar"></button>
            </div>
            <div class="offcanvas-body">
                <div id="user_data">
                    <h1> My Profile</h1>
                    <h2>{{ role[user.roles_id] }}</h2>
                    <img :src="user.image" alt="">
                    <p>Name: {{ user.name }}</p>
                    <p>Email: {{ user.email }}</p>
                    <p>created_at: {{ user.created_at }}</p>

                    <button @click="logout()">Logout</button>
                </div>
            </div>
        </div>

        <main>
            <router-view>

            </router-view>

        </main>
    </div>
</template>
<style scoped>
@import url(/src\assets\styles\client.css);
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
        this.$router.push('/pClient');
   
        if (localStorage.token) {
            this.token = localStorage.token;
            this.user = JSON.parse(localStorage.user);
            console.log("rol: "+ this.user.roles_id);
            if (this.user.roles_id === 1) {
                
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
    methods:{
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