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

        this.token=localStorage.token;
        this.role=localStorage.role;
    
        if(this.role==3){
                        console.log('entramos(?) 3 if XD');
                        this.$router.push('/admin');
                        console.log('y olei');
                    }
                    else if(this.role==2){
                        console.log('entramos(?) 2 if XD');
                        this.$router.push({
                            name: "Employee",
                        });
                    }
                    else if(this.role==1){
                        console.log('entramos(?) 1 if XD');
                        this.$router.push('/client');
                    }
                    else{
                        this.$router.push({
                            name: "Login",
                            params: {
                                message:
                                    "Ups! algo salión mal, por favor intentalo de nuevo. Account",
                            },
                        });
                    }

    },


    methods: {
        // async get_user() {
        //     try {
        //         const rs = await this.axios.get('/api/user', {
        //             headers: { Authorization: `Bearer ${this.token}`}
        //         });

        //         this.user = JSON.strngify(rs.data.user);

        //         this.role = JSON.strngify(rs.data.user.role_id);
        //         console.log('user: ' + this.user);

        //         console.log('rol: ' + this.role);

        //           if(this.role==3){
        //                 console.log('entramos(?) 3 if XD');
        //                 this.$router.push('/admin');
        //                 console.log('y olei');
        //             }
        //             else if(this.role==2){
        //                 console.log('entramos(?) 2 if XD');
        //                 this.$router.push({
        //                     name: "Employee",
        //                 });
        //             }
        //             else if(this.role==1){
        //                 console.log('entramos(?) 1 if XD');
        //                 this.$router.push('/client');
        //             }
        //             else{
        //                 this.$router.push({
        //                     name: "Login",
        //                     params: {
        //                         message:
        //                             "Ups! algo salión mal, por favor intentalo de nuevo.",
        //                     },
        //                 });
        //             }


        //     } catch (e) {
        //         this.$router.push({
        //             name: "Login",
        //             params: {
        //                 message:
        //                     "no estas autorizado para aceder a esta cuenta get user."
        //             },

        //         });

        //     }


        // },
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