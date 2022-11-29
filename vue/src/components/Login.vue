<template>

    <main class="form-signin w-100 m-auto">
        <div id="login">

            <form>
                <h1 id="nombre">Log In</h1>
                <div class="form-floating">
                    <label for="floatingInput">E-mail</label> <br>
                    <input type="email" name="email" class="form-control" v-model="form.email">

                    <span v-if="errors.email">{{ errors.email[0] }}</span>
                </div>

                <div class="form-floating">
                    <label for="floatingPassword">Password</label><br>
                    <input type="password" name="password" class="form-control" v-model="form.password">
                    <span v-if="errors.password">{{ errors.password[0] }}</span>
                </div>
                <button type="button" id="enviar" class="btn btn-outline-success" @click="login()">Log In</button>
                <span v-if="message">{{ message }}</span>

                <router-link class="link" to="/forgot-password">¿olvidaste tu contraseña?</router-link>
                <br>
            </form>
            <div id="redes">
                <!-- <h7>
                    <span id="n_red" class="text-white">
                        Login using social networks
                    </span>
                </h7> -->
                <div class="redes mx-auto pt-3">
                    <a class="circulo facebook" href="https://es-la.facebook.com/ClaroCol/" type="button"
                        role="button"><i class="fab fa-facebook-f"></i></a>

                    <a class="circulo instagram" href="https://www.instagram.com/clarocolombia/?hl=es" type="button"
                        role="button"><i class="fab fa-instagram"></i></a>
                    <a class="circulo twitter"
                        href="https://twitter.com/ClaroColombia?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                        type="button" role="button"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

        </div>



    </main>
    <router-view name="redes"> </router-view>
</template>
<style scoped>
@import url(/src\assets\styles\login.css);
</style>

<script>
export default {
    data() {
        return {
            message: null,
            form: {
                email: "",
                password: "",
                user: "",
                role: "",
            },
            errors: {},
        };
    },
    mounted() {
        if (this.$route.params.message)
            this.message = this.$route.params.message;
    },
    methods: {
        async login() {

            try {
                const rs = await this.axios.post('/api/login', this.form);
                localStorage.token = rs.data.token;
                localStorage.user = JSON.stringify(rs.data.user);
                this.user = localStorage.user;
                this.role = JSON.stringify(rs.data.user.roles_id);
                console.log('role: ' + this.role);

                    if(this.role==3){
                        console.log('entramos(?) 3 if XD');
                        this.$router.push('/admin');
                        console.log('y olei');
                    }
                    if(this.role==2){
                        console.log('entramos(?) 2 if XD');
                        this.$router.push({
                            name: "Employee",
                        });
                    }
                    if(this.role==1){
                        console.log('entramos(?) 1 if XD');
                        this.$router.push('/client');
                    }
                    else{
                        this.$router.push({
                            name: "Login",
                            params: {
                                message:
                                    "Ups! algo salión mal, por favor intentalo de nuevo.",
                            },
                        });
                    }
                // switch (this.role) {

                //     case 3:
                //         console.log('entramos(?) 3');
                //         this.$router.push({
                //             name: "admin",
                //         });
                //         break;
                //     case 2:
                //         console.log('entramos(?) 2');
                //         this.$router.push({
                //             name: "Employee",
                //         });
                //         break;
                //     case 1:
                //         console.log('entramos(?) 1');
                //         this.$router.push({
                //             name: "client",
                //         });
                //         break;

                //     default:
                //         this.$router.push({
                //             name: "Login",
                //             params: {
                //                 message:
                //                     "Ups! algo salión mal, por favor intentalo de nuevo. login",
                //             },
                //         });
                // }


            }
            catch (e) {
                this.errors = {};
                this.message = null;

                if (e.response.data.errors)
                    this.errors = e.response.data.errors;
                else if (e.response.data.message)
                    this.message = e.response.data.message;

                console.log(e);
            }

        },
    },

};
</script>