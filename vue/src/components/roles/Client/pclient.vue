<template>
  <div id="product">
    <div id="filtro">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model="search"
          @keyup="filtrar()" id="busca">
      </form>
      <!-- Button trigger modal crear -->
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#carrito" id="crea"
        @click="get_details(11)">
        <i class="bi bi-cart-fill" id="mas"></i>
        <span style="position: absolute; bottom:-0.3rem; color:black;">{{ total }}</span>
      </button>

    </div>

    <div id="articulos">
      <!-- card -->
      <div class="card mb-3" style="max-width: 540px;" v-for="p in product_list_mostrar" :key="'pro' + p.code"
        :class="{ selected: p.selected }" @click="insert(p)">
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


  <!-- carrito modal -->
  <div class="modal fade modal-dialog-scrollable" id="carrito" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">price</th>

              </tr>
            </thead>
            <tbody>
              <tr v-for="d in carrito">
                <td scope="row">{{ d.name }}</td>
                <td scope="row">
                  <div id="contmore">
                    <span class="more" @click="d.amount--">
                      <b @click="put_sale()">-</b></span>
                    <span class="amount">
                      {{ d.amount }}
                    </span>
                    <span class="more" @click="d.amount++">
                      <b @click="put_sale()">+</b></span>
                  </div>

                </td>
                <td scope="row">{{ d.amount * d.price }}</td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success">Comprar {{ total }}</button>
        </div>
      </div>
    </div>
  </div>


</template>
<script>
export default {
  data() {
    return {
      user: {},
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
        image: '1',
      },

      //factura//
      sale: {

        users_id: "",
        date: "2022/12/13",
        sales_number: "1010100101",
        state: 1,
        total: "",

      },
      sale_detail:{
        articles_id:"",
        sales_id:"",
        amount:1,
        price:"",
        subtotal:"",
        iva:"",
        total:"",

      },
      carrito: [

      ],
      product_edit: {},
      idelete: "",
      total: "100000",
    };
  },
  mounted() {
    this.get_products();
    this.user = JSON.parse(localStorage.user);
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
    close() {
      this.product = "";
      this.edit_product = "";
    },
    eliminar(name) {
      this.nameborrar = name;
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
    async insert(p) {
      this.sale.users_id = this.user.id;
      this.sale.total = p.selling_price;
      this.sale_detail.articles_id=p.id;
      console.log('sale: ' + JSON.stringify(this.sale));
      let response = await this.axios.post("/api/sales/", this.sale);
      // console.log('respondio: '+ JSON.stringify(response.data));
      if(response.data!=null){
        this.put_article(response.data)
      }
    },
    more() {

    },
    less() {

    },
    async put_article(id) {
      console.log('id: '+id);
      this.sale_detail.sales_id=id;
      let response = await this.axios.post("/api/sales_details/", this.sale_detail);
    },

    eliminar(id_buscar) {



    },
    async get_details(id) {
      console.log('alguna monda');
      let response = await this.axios.get("/api/carrito/" + id);
      this.carrito = response.data;
      // console.log('articles: '+this.sales_details);
    },

  },
};
</script>
<style scoped>
@import url(/src\assets\styles\products.css);
</style>
