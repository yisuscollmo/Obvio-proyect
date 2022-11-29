<template>

<nav class="navbar">

<div id="logo"> <img src="/src\assets\image\logo_claro.png"></div>


<div id="conte">
  <div>
    <router-link to="/" type="button" id="ini" class="btn btn-outline-success link">HOME</router-link>
    <router-link to="/login" type="button" id="ini" class="btn btn-outline-success link">LOG IN</router-link>
    <router-link to="/register" type="button" id="ini" class="btn btn-outline-success link">REGISTER </router-link>
    <router-link to="/admin" type="button" id="ini" class="btn btn-outline-success link">ADMIN </router-link>
    <router-link to="/client" type="button" id="ini" class="btn btn-outline-success link">CLIENT </router-link>
    <router-link to="/employee" type="button" id="ini" class="btn btn-outline-success link">EMPLOYEE </router-link>
  </div>


</div>
<!-- Default dropstart button -->
<div class="btn-group dropstart">
  <button type="button"  class="bi bi-list" data-bs-toggle="dropdown" aria-expanded="false" id="raya" ></button>
  <ul class="dropdown-menu">
    <!-- Dropdown menu links -->
    <router-link to="/" type="button" id="inira" class="btn btn-outline-success link">HOME</router-link>
    <router-link to="/login" type="button" id="inira" class="btn btn-outline-success link">LOG IN</router-link>
    <router-link to="/register" type="button" id="inira" class="btn btn-outline-success link">SIGN IN </router-link>
  </ul>
</div>
</nav>

 
</template>
<style scoped> 

  

  
  .link {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
    width: max-content;
    height: max-content;
    color: #ffffff;
  }
  
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
    height: 8rem;
    width: 10rem;
    margin-top: 4rem;
 
  }
  
  footer {
    display: flex;
    height: 4rem;
    background-color: transparent;
    justify-content: flex-end;
  }
  
  #redes {
    display: flex;
    flex-flow: row;
    /* margin: 2rem;
    width: 18rem;
    height: 5rem;
    margin: 0; */
    /* border: 1px solid black; */
    text-align: center;
  
  
  
  }
  
  #ini {
    display: block;

    width: max-content;
    height: 3rem;
    font-size: 1.5rem;
   
    border: 0;
    font-family: fantasy;
    transition: none !important;


  }
  .btn-outline-success {
    color: none !important;
    border-color: none !important;
}
.btn-outline-success {
    color: none !important;
    border-color: none !important;
}

.btn-outline-success.focus, .btn-outline-success:focus {
    box-shadow: none !important;
}
  
 
  #conte {
    display: flex;
    flex-flow: column;
    /* border: 3px solid red; */

    width: max-content;
    height: 6.4rem;
    margin: 0;

    justify-content: center;
  
  }
  #conte div{
    display: flex;
    flex-direction: row;
  }
  
  .facebook,
  .instagram,
  .youtube,
  .twitter,
  .whatsapp {
    color: #ffffff;
    font-size: 2.5rem;
    margin-left: 1rem;
  }
  #raya{
    font-size: 3em;
    background: transparent;
    color: #ffffff;
    border: 0;
    display: none;
  }
  @media(max-width: 600px) {
    #raya {
        display: block;
    }
    #conte{
      display: none;
    }
  }
  .dropdown-menu{
    background: rgba(0, 0, 0, 0.705);
    backdrop-filter: blur(3px) brightness(150%);
    width: 4em !important;
  }
  #inira {
    display: block;
    width: 6.6em;
    height: 3rem;
    font-size: 1.5rem;
    border: 0;
    font-family: fantasy;
    transition: none !important;


  }
</style>