<template>
  <div id="product">
    <div id="filtro">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" v-model="search"
          @keyup="filtrar()" id="busca">
      </form>
    </div>
    <!-- card2 -->
    <div id="articulos">
      <div class="card mb-3" style="max-width: 540px;" v-for="p in product_list_mostrar">
        <div class="row g-0">
          <figure class="figure">
            <img src="../assets/image/default.jpg" class="figure-img img-fluid rounded" >
          </figure>

          <div class="col-md-8">
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
      },
      product_edit: {},
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
    async new_products() {
      let response = await this.axios.post("/api/articles", this.product);
    },
    edit_product(p) {
      this.product_edit = p;
      this.product_edit.image = 1;
    },
    async update_products() {
      let id = this.product_edit.id;
      let response = await this.axios.put("/api/articles" + id, this.product_edit);
    },
    async delete_product(p) {
      let id = p;
      console.log(id);
      let response = await this.axios.delete("/api/articles" + id);
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
#filtro {
  display: flex;
  z-index: 1;
  background-color:  #F4F6F7;
  position: sticky;
  width: 100%;
  height: 5rem;
  /* border: 1px solid yellow; */
  top: 0;
  justify-content: space-between;
  /* border-bottom: 3px solid black; */
  -webkit-box-shadow: -5px 3px 31px -8px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: -5px 3px 31px -8px rgba(0, 0, 0, 0.75);
  box-shadow: -5px 3px 31px -8px rgba(0, 0, 0, 0.75);
}
#busca {
  margin-left: 2rem;
  margin-top: 7px;
  height: 3.5em;
  width: 15em;
}
#mas {
  display: flex;
  flex-direction: column;
  font-size: 3.5em;
  margin-right: 0.5em !important;
  margin-top: 7px;
  color: green;

}
#product {
  display: flex;
  flex-flow: column;
  width: 100%;
  height: 100%;
  /* border: 2px solid red; */
}

#articulos {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  overflow-y: scroll;
  width: 100%;
  height: calc(100% - 5rem);
  /* border: 2px solid blue; */
}

.card {

  display: flex;
  flex-flow: column;
  margin: 1rem;
  /* height: 15rem; */
  /* border: 2px solid black;  */
}

figure {
  height: 12rem;
  width: 12rem;
}

#drop {
  /* padding-left: 15em; */
  /* border: 1px solid red; */
  justify-content: end;
  display: flex;
  /* background-color: ; */
}


#img {
  height: 100%;
}

.dropdown-menu {
  margin-left: -9em !important;
}

#edi-eli {
  display: flex;
  flex-flow: row;
  justify-content: space-between;
  /* border: 3px solid yellow; */
  height: max-content;
  width: 7em;
  margin-left: 1.3em !important;


}

#inv-code {
  display: flex;
  margin-top: -1em;
  height: max-content;
  /* justify-content: end; */
  /* border: 2px solid black; */
  justify-content: space-between;

}

.card:hover {
  border: 2px solid green;
  -webkit-box-shadow: 17px 12px 26px -17px rgba(0, 0, 0, 0.57);
  -moz-box-shadow: 17px 12px 26px -17px rgba(0, 0, 0, 0.57);
  box-shadow: 17px 12px 26px -17px rgba(0, 0, 0, 0.57);
}
</style>