<template>
  <!-- <h1>Images:</h1> -->
  <div id="container-images">
    <div class="mb-3" id="inmages">
      <label for="exampleFormControlInput1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name">
      <label for="formFile" class="form-label">Default file input example</label>
      <input class="form-control" type="file" id="formFile">
      <div class="d-grid gap-2">
        <br>
        <button class="btn btn-success" type="button">Button</button>
       
      </div>
    </div>
    <div id="images">

      <div id="art-images">
        <article class="article-image" v-for="i in images_list_mostrar">
          <figure>
            <h1>{{ i.name }}</h1>
            <img :src="i.image" alt="">
          </figure>

        </article>

      </div>
    </div>

  </div>
</template>
<style>
#container-images {
  display: flex;
  flex-direction: column;
  width: 100%;
  height: 100%;

}

#inmages {
  position: sticky !important;
  padding: 1rem;
  background-color: rgba(0, 0, 0, 0.308);

}

#images {
  display: flex;
  flex-direction: column;
  width: 100%;
  height: 100%;
  overflow-y: scroll;

}

#art-images {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  height: max-content;
}

.article-image {
  position: relative;
  width: 20rem;
  height: 15rem;
  border: 1px solid rgb(15, 141, 78);
  margin: 1rem;
  border-radius: 1rem;
  transition: ease-in-out 100ms;
}

.article-image:hover {
  transform: scale(1.05);
  box-shadow: green 1px 1px 1px 1px, rgba(0, 0, 0, 0.76) 3px 3px 3px;
}

figure {
  width: 100%;
  height: 100%;
}

img {
  width: 100%;
  height: 100%;
  border-radius: 1rem;
}

h1 {
  position: absolute;
  bottom: -0.5rem;
  border-radius: 1rem;
  background-color: rgba(0, 0, 0, 0.562);
  width: 100%;
  font-size: x-large;
  /* padding: 0.5rem; */
  color: white;
}
</style>
<script>
export default {
  data() {
    return {
      images_list: [],
      images_list_mostrar: [],
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
        image: '1'
      },
      product_edit: {},
      idelete: ""
    };
  },
  mounted() {
    this.get_images();
  },
  methods: {
    async get_images() {
      let response = await this.axios.get("/api/images");
      this.images_list = response.data;
      this.images_list_mostrar = this.images_list;
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
  },
};

</script>