<template>
    <h1>My Buys:</h1>
    
    <div id="client_buys">
      <div id="container_buys">
      
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sale number</th>
                        <th scope="col">State</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody v-for="p in buys_list_show">
                    <tr>
                        <td>{{p.sales_number}}</td>
                        <td>{{p.state}}</td>
                        <td>{{p.date}}</td>
                        
                    </tr>
                </tbody>
            </table>
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
        let response = await this.axios.get("/api/sales/");
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