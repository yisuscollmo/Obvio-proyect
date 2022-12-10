<template>
   <div id="container_reset">
      <div id="reset">
         <h1 id="nombre"> Reset Password</h1>
         <form>
            
            <label for="">Email</label><br>
            <input type="text" name="email" v-model="form.email"><br>
            <span v-if="errors.email">{{ errors.email[0] }}</span>

            <label for="">New password</label><br>
            <input type="password" name="password" v-model="form.password">
            <br>
            <label for="">Password confirmation</label><br>
            <input type="password" name="password_confirmation" v-model="form.password_confirmation">
            <br>
            <span v-if="errors.password">{{ errors.password[0] }}</span>
            <br>
            <p v-if="message"> {{ message }}</p>

            <button type="button" id="enviar" class="btn btn-outline-success" @click="change_password()">
               Reset Password</button>

            <br>
         </form>
      </div>
   </div>


</template>
<style>
#container_reset {
   display: flex;
   flex-direction: row;
   justify-content: center;
   width: 100%;
   height: 100%;
  

}

#reset {
   display: flex;
   flex-direction: column;
   width: 25rem;
   height: max-content;
   padding: 1rem;
   margin-top: 1rem;
   border-radius: 1rem;
   background-color: rgba(0, 0, 0, 0.432);
   /* justify-content: center; */
   /* border-radius: 1px solid red; */
}


label {
   color: rgb(255, 255, 255);
   text-shadow: black 1px 2px 2px 1px;
}
input{
   width: 100%;
}
</style>


<script>


export default {
   data() {
      return {
         message: null,
         form: {
            email: "",
            password: "",
            password_confirmation: "",
            token: null,
         },
         errors: {},
      };
   },

   mounted() {
      if (this.$route.query.token)
         this.form.token = this.$route.query.token;
   },
   methods: {
      async change_password() {
         try {
            const rs = await this.axios.post('/api/reset ', this.form);
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