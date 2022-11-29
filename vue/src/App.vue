<template>
 <!-- <router-link v-if="this.$route.path == '/account'" class="link" to="/account">account</router-link> -->
<router-view name="NavBar"> </router-view>


  <div id="container_main">

   
    
      <router-view>
        
      </router-view>
  
      
  </div>
  

</template>
<style scoped>


@import url(/src\assets\styles\app.css);
</style>