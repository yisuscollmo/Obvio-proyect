<template>
  <div id="product">
    <div id="filtro">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model="search"
          @keyup="filtrar()" id="busca">
      </form>
      <!-- Button trigger modal crear -->
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#carrito" id="crea">
        <i class="bi bi-cart-fill" id="mas" ></i>
        <span style="position: absolute; bottom:-0.3rem; color:black;" >{{total}}</span>
      </button>

    </div>
   
    <div id="articulos">
       <!-- card -->
      <div class="card mb-3" style="max-width: 540px;" 
      v-for="p in product_list_mostrar"  :key="'pro' + p.code"
      :class="{ selected: p.selected }" @click="insertar(p)" >
        <div class="row g-0">

          <figure class="figure">
            <img :src="axios.defaults.baseurl + p.image" class="figure-img img-fluid rounded">
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
 

  <!-- carrito modal -->
<div class="modal fade modal-dialog-scrollable" id="carrito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="item in factura" :key="'item' + item.id">
      <th scope="row">1</th>
      <td>{{item.id}}</td>
      <td>{{item.price}}</td>
      <td>{{item.amount}}</td>
      <td>{{item.total}}</td>
      <td>{{item.iva}}</td>
    </tr>
  
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Comprar</button>
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
      nameborrar: "",
      product: {
        name: "",
        code: "",
        image: 1,
        stock: "",
        description: "",
        selling_price: "",
        categories_id: "",
        active: "",
        image:'1',
          //factura//
        factura: [],
        
      },
      product_edit: {},
      idelete:"",
      total:"Total XD",
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
    eliminar(name){
             this.nameborrar=name;
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

    //factura//
       insertar(p){
        this.factura+=p
       },

      eliminar(id_buscar) {
         this.item_factura.forEach((item, index) => {
            if (item.id == id_buscar) {
               //Restamos los valores anteriores de la factura
               this.factura.total -= item.total;
               this.factura.subtotal -= item.subtotal;
               this.factura.iva -= item.iva;

               this.item_factura.splice(index, 1);
            }
         });

         let item = this.mostrar_productos.find((pro) => pro.id == id_buscar);
         item.selected = false;
      },

  },
};
</script>
<style scoped>
@import url(/src\assets\styles\products.css);
</style>
