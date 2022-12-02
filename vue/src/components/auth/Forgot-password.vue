<template>
    <div id="body">
       

        <form>
            <h1>comfirma tu correo</h1>
            <h4>lost your password? please enter your email  address.
                 You will receive a link to create a new password via email.</h4>
            <div class="input-field">   
                <label>Email</label>
                <input type="email" name="email" v-model="email">
                <span v-if="errors.email">{{ errors.email[0] }}</span>
            </div>
            <br />
            <button type="button" id="enviar" class="btn btn-outline-success"  @click="send_email">Reset Password</button>
            <br />
            <p v-if="message">{{ message }}</p>
        </form>
    </div>
</template>
<style scoped>
    @import url(/src\assets\styles\forgot.css);
    </style>

<script>
export default {
    data() {
        return {
            message: null,
            email: "",
            errors: {},
        };
    },
    methods: {
        async send_email() {
            try {
                const rs = await this.axios.post(
                    '/api/forgot-password',
                    { email: this.email });


                this.$router.push({
                    name: 'Login',
                    params: { message: rs.data.message },
                });

            } catch (e) {
                this.errors = {};
                this.message = null;

                if (e.response.data.errors)
                    this.errors = e.response.data.errors;
                else if (e.response.data.message)
                    this.message = e.response.data.message;

            }

        },
    },

};
</script>