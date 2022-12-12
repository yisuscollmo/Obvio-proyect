<template>
  <h1>My Buys:</h1>

  <div id="client_buys">
    <div id="container_buys">

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Sale number</th>
            <th>Articles</th>
            <th scope="col">State</th>
            <th scope="col">Data</th>
          </tr>
        </thead>
        <tbody v-for="p in buys_list_show">
          <tr>
            <td>{{ p.sales_number }}</td>
            <td>
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false" @click="get_details(p.id)">
                  Articles
                </a>

                <ul class="dropdown-menu">
                  <li v-for="d in sales_details"><a class="dropdown-item" href="#">{{d.name}}</a></li>
                
                </ul>
              </div>
            </td>
            <td>{{ p.state }}</td>
            <td>{{ p.date }}</td>

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
      sales_details:[],
      user: {},
      search: "",

    }
  },
  mounted() {
    
    this.user = JSON.parse(localStorage.user);
    this.search = JSON.parse(this.user.id);
    // console.log("search: " + this.search)
    this.get_buys();




  },
  methods: {
    async get_buys() {
      let id=this.search;
      // console.log('id: '+ id);
      let response = await this.axios.get("/api/sales/" + id);
      // console.log('respondio: '+ response);
      this.buys_list = response.data;

      this.buys_list_show = this.buys_list;
      // this.buys_list_show.forEach(element => {
      //   console.log(element);

      // });

    
    },
    async get_details(id){
      let response = await this.axios.get("/api/sales_details/" + id);
      this.sales_details=response.data;
      // console.log('articles: '+this.sales_details);
    },
    

  }
};
</script>