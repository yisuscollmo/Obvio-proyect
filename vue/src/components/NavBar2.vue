<template>

  <nav class="navbar">

    <!-- <div id="logo" > <img src="/src\assets\image\logo_claro.png"></div> -->
    <router-link to="/"  id="logo"><img src="/src\assets\image\logo_claro.png"></router-link>

    <router-link to="/" type="button" id="boton" class="btn btn-outline- link"><i
       class="bi bi-house-door-fill"></i></router-link>
      
    
  </nav>

</template>
<style scoped>

 nav {
   display: flex;
   flex-flow: row;
   justify-content: space-between;
   width: 100%;
   height: 5.5rem;
   background-color: black;
 }

 #logo {
   display: flex;
   flex-flow: column;
   height: 4rem;
   width: 10rem;
   margin-top: 1rem;

 }

 .btn-outline-success {
   color: none !important;
   border-color: none !important;
 }

 .btn-outline-success {
   color: none !important;
   border-color: none !important;
 }

 .btn-outline-success.focus,
 .btn-outline-success:focus {
   box-shadow: none !important;
 }

 #boton{
    display: block;
    width: max-content;
    height: 3rem;
    font-size: 2rem;
    border: 0;
    margin-right: 1em;
    font-family: fantasy;
    transition: none !important;
    color: #ffffff;
  }
</style>

