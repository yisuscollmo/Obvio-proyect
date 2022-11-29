<template>
    <h1>My Buys:</h1>
    
    <div id="client_buys">
      <div id="container_buys">
        <article v-for="s in buys_list_show">
          <p>Date: {{s.date}}</p>
          <p>invoice number: {{s.invoice_number}}</p>
          <p>User: {{s.users_id}}</p>
          <p>Article: {{s.articles_id}}</p>
          <p>State: {{s.state}}</p>
          <p>Total: {{s.total}}</p>
        </article>
      </div>
    </div>
  
  </template>
  <style>
  #client_buys {
    width: 100%;
    height: 100%;
  }
  
  #container_buys {
    display: flex;
    flex-wrap: wrap;
    height: max-content;
    width: 100%;
    justify-content: center;
  }
  </style>
  
  <script>
  export default {
    data() {
      return {
        buys_list: [],
        buys_list_show: [],
        user:{},
        search:"",
  
      }
    },
    mounted() {
      this.get_buys();
      this.user= JSON.parse(localStorage.user);
      this.search=this.user.id;
      console.log("search: " + this.search)
  
      
      
  
    },
    methods: {
      async get_buys() {
        let response = await this.axios.get("/api/sales");
        this.buys_list = response.data;
  
        this.buys_list_show = this.buys_list;
        this.buys_list_show.forEach(element => {
          console.log(element);
  
        });
        
        this.filtrar();
      },
      filtrar() {
              
              this.buys_list_show = this.buys_list.filter(
                  (s) =>
                      (s.users_id.toString().toLowerCase().toString().indexOf(this.search.toString()) > -1)
  
              );
            //   console.log('whaaaat');
          },
  
    }
  };
  </script>