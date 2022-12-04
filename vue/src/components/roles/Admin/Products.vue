<template>
  <div id="product">
    <div id="filtro">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model="search"
          @keyup="filtrar()" id="busca">
      </form>
      <!-- Button trigger modal crear -->
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crear" id="crea">
        <i class="bi bi-plus" id="mas"></i>
      </button>

    </div>
    <!-- card -->
    <div id="articulos">
      <div class="card mb-3" style="max-width: 540px;" v-for="p in product_list_mostrar">
        <div class="row g-0">

          <figure class="figure">
            <img :src="p.image" class="figure-img img-fluid rounded">
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
              <div id="drop">
                <div class="btn-group dropup">
                  <i class="bi bi-three-dots-vertical" data-bs-toggle="dropdown" aria-expanded="false" id="puntos"></i>

                  <li class="dropdown-menu">
                    <div id="edi-eli">
                      <button type="button" class="btn btn-success" data-bs-toggle="modal"
                       @click="edit_product(p)"
                        data-bs-target="#editar">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                      data-bs-target="#eliminar" @click="eliminar(p.name)">
                        <i class="bi bi-trash"></i>
                      </button>
                    </div>
                  </li>
                </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
 
  <!-- Modal-eliminar -->
  <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5> Delete Product</h5>
        </div>
        <div class="modal-body">
          estas seguro de elimar el producto {{nameborrar}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" @click="delete_product()">eliminar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal-editar -->
  <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Edit product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">image:</label>
              <input type="file" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">code:</label>
              <input type="text" class="form-control" id="recipient-name" v-model="product_edit.code">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">name:</label>
              <input type="text" class="form-control" id="recipient-name" v-model="product_edit.name">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">price:</label>
              <input type="text" class="form-control" id="recipient-name" v-model="product_edit.selling_price">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">inventory:</label>
              <input type="text" class="form-control" id="recipient-name" v-model="product_edit.stock">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">active:</label>
              <input type="text" class="form-control" id="recipient-name" v-model="product_edit.active">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">description:</label>
              <textarea class="form-control" id="message-text" v-model="product_edit.description"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="close">Close</button>
          <button type="button" class="btn btn-success" data-bs-dismiss="modal" @click="update_products()">edit</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal-crear -->
  <div class="modal fade" id="crear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">create new product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">image:</label>
              <input type="file" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">code:</label>
              <input type="text" class="form-control" id="recipient-name" v-model="product.code">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">name:</label>
              <input type="text" class="form-control" id="recipient-name" v-model="product.name">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">price:</label>
              <input type="text" class="form-control" id="recipient-name" v-model="product.selling_price">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">inventory:</label>
              <input type="text" class="form-control" id="recipient-name" v-model="product.stock">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">categoria:</label>
              <input type="text" class="form-control" id="recipient-name" v-model="product.categories_id">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">active:</label>
              <input type="number" class="form-control" id="recipient-name" v-model="product.active">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">description:</label>
              <textarea class="form-control" id="message-text" v-model="product.description">
              </textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="close">Close</button>
          <button type="button" class="btn btn-success"  data-bs-dismiss="modal" @click="new_product()">create</button>
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
        image:'1'
      },
      product_edit: {},
      idelete:""
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
  },
};
</script>
<style scoped>
@import url(/src\assets\styles\products.css);
</style>
