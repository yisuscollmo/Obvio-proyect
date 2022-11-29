<template>
    <div class="container-body">

        <div class="container-main">
            <form>
                <h1 id="nombre">Sign In</h1>
                <div class="form-floating">
                    <label for="floatingInput">name</label><br>
                    <input type="text" name="name" class="form-control" v-model="form.name">
                    <span v-if="errors.name">{{ errors.name[0] }}</span>
                </div>
                <div class="form-floating">
                    <label for="floatingInput">email</label><br>
                    <input type="text" name="email" class="form-control" v-model="form.email">
                    <span v-if="errors.email">{{ errors.email[0] }}</span>
                </div>
                <div class="form-floating">
                    <label for="floatingInput">new password</label><br>
                    <input type="password" name="password" class="form-control" v-model="form.password">
                    <span v-if="errors.password">{{ errors.password[0] }}</span>
                </div>
                <div class="form-floating">
                    <label for="floatingInput">password confirmation</label><br>
                    <input type="password" name="password_confirmation" class="form-control"
                        v-model="form.password_confirmation">
                    <span v-if="errors.password_confirmation">{{ errors.password_confirmation[0] }}</span>
                </div>
                <p v-if="message"> {{ message }}</p>

                <button type="button" id="enviar" class="btn btn-outline-success" @click="register()">Sign In</button>
            </form>
            <div class="redes2 mx-auto pt-3">
                <div>
                    <span id="n_red" class="text-white">
                        Sign up using social networks
                    </span>
                </div>
                <div>
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
    </div>
</template>
<style scoped>
@import url(/src\assets\styles\register.css);
</style>
<script>


export default {
    data() {
        return {
            message: null,
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",

            },
            errors: {},
        };
    },

    mounted() {
        if (this.$route.params.message)
            this.message = this.$route.params.message;
    },
    methods: {
        async register() {
            try {
                console.log(this.form);
                const rs = await this.axios.post('/api/register/', this.form);
                this.$router.push({
                    name: "Login",
                    params: {
                        message: rs.data.message,
                    }

                });
                localStorage.token = rs.data.token
            }
            catch (e) {

                this.errors = {};
                this.message = null;
                console.log(e);
                if (e.response.data.errors)
                    this.errors = e.response.data.errors;
                else if (e.response.data.message)
                    this.message = e.response.data.message;
            }
        }
    },

};
</script>