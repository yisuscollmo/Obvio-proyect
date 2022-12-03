<template>
 <h1>
    Account:
 </h1>
    <router-view>

    </router-view>
</template>
<style>
h1 {
    color: #ffffff;
}
</style>
<script>
export default {
    data() {
        return {
            token: null,
            user: "",
            role: ""
        };
    },
    mounted() {

        // console.log("abrio XD");
        // if (localStorage.token) {
        //     // this.user = localStorage.user;
        //     this.token = localStorage.token;
        //     // this.get_user();
        //     this.role = this.user.roles_id
        //     console.log("user: " + this.role)
           


        // } else {
        //     this.$router.push({
        //         name: "Login",
        //         params: {
        //             message: "No estas autorizado para acceder a esta cuenta account"
        //         },
        //     })
        // }
    //      switch (this.role) {

    //             case 3:
    //                 this.$router.push({
    //                     name: "admin",
    //                 });
    //                 break;
    //             case 2:
    //                 this.$router.push({
    //                     name: "Employee",
    //                 });
    //                 break;
    //             case 1:
    //                 this.$router.push({
    //                     name: "client",
    //                 });
    //                 break;

    //             default:
    //                 this.$router.push({
    //                     name: "Login",
    //                     params: {
    //                         message:
    //                             "Ups! algo salión mal, por favor intentalo de nuevo.",
    //                     },
    //                 });
    //         }

    },


    methods: {
        async get_user() {
            try {
                const rs = await this.axios.get('/api/user', {
                    headers: { Authorization: `Bearer ${this.token}` }
                });

                this.user = rs.data.user

                this.role = rs.data.user.role_id
                console.log('user: ' + this.user);

                console.log('rol: ' + this.role);


            } catch (e) {
                this.$router.push({
                    name: "Login",
                    params: {
                        message:
                            "no estas autorizado para aceder a esta cuenta get user."
                    },

                });

            }


        },
        async logout() {
            try {
                const rs = await this.axios.get("/api/logout", {
                    headers: { Authorization: `Bearer ${this.token}` }
                });
                localStorage.clear();

                this.$router.push({
                    name: "Login",
                    params: {
                        message: rs.data.message,
                    },
                })


            } catch (e) {
                this.$router.push({
                    name: "login",
                    params: {
                        message: e.response.data.message,
                    },
                });

            }
        }
    },
};
</script>
<style>

</style>