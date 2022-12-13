<template>
  <div id="product">
    <div id="filtro">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model="search"
          @keyup="filtrar()" id="busca">
      </form>
      <!-- Button trigger modal crear -->
  

    </div>
   
    <div id="articulos">
       <!-- card -->
      <div class="card mb-3" style="max-width: 540px;" v-for="p in product_list_mostrar">
        <div class="row g-0">

          <figure class="figure">
            <img :src="axios.defaults.baseURL + p.image" class="figure-img img-fluid rounded">
          </figure>

          <div class="col-md-7">
            <div class="card-body">
              <div id="inv-code">
                <small>{{ p.code }}</small>
                <small>{{ p.stock }}</small>
              </div>
              <h5 class="card-title" style="text-align: center;">{{ p.name }}</h5>
              <small>{{ p.description }}</small>
              <h5>{{ p.selling_price }}</h5>
             
          </div>
        </div>
        </div>
      </div>
    </div>
  
 
  
    
  </div>

</template>
<script>
export default {
  data() {
    return {
      product_list: [],
      product_list_mostrar: [],
      search: "",
     
    };
  },
  mounted() {
    this.get_products();
  },
  methods: {
    async get_products() {
      let response = await this.axios.get("/api/articles");
      this.product_list = response.data;
      this.product_list_mostrar = this.product_list;
    },
    async new_product() {
      console.log(this.product);
      let response = await this.axios.post("/api/articles", this.product);
      this.get_products();

    },
    edit_product(p) {
      this.product_edit = p;
      this.product_edit.image = 1;
    },
    async update_products() {
      let id = this.product_edit.id;
      let response = await this.axios.put("/api/articles/" + id, this.product_edit)
      .then(this.close());
      this.get_products();
    },
    close(){
      this.product="";
      this.edit_product="";
    },
    eliminar(p){
             this.nameborrar=p.name;
             this.idelete=p.id
             console.log('a borra' + this.produlete);
    },

    async delete_product(p) {
      let id = this.idelete;
      console.log(id);
      let response = await this.axios.delete("/api/articles/" + id);
      this.get_products();

    },
    filtrar() {
      this.product_list_mostrar = this.product_list.filter(
        (p) =>
          (p.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
          (p.code.toString().toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
          (p.description.toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
          (p.selling_price.toString().toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
          (p.stock.toString().toLowerCase().toString().indexOf(this.search.toLowerCase()) > -1)

      );
    },
  },
};
</script>
<style scoped>
@import url(/src\assets\styles\products.css);
</style>
