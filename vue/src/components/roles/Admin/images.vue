<template>
  <!-- <h1>Images:</h1> -->
  <div id="container-images">
    <div class="mb-3" id="inmages">
      <label for="exampleFormControlInput1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="put a name" v-model="image.name">
      <label for="formFile" class="form-label">Default file input example</label>
      <input class="form-control" type="file" id="formFile" @change="obtener_image">
  
      <div class="d-grid gap-2">
        <figure v-if="imagenminiatura!=null">
                <img :src="imagen" id="imagenminiatura" alt="">
          </figure>
        <br>
        <button class="btn btn-success" type="button" @click="new_image">Subir imagen</button>

      </div>

    </div>
    <div id="images">

      <div id="art-images">
        <article class="article-image" v-for="i in images_list_mostrar">
          <figure>
            <h1 id="neimage">{{ i.name }}</h1>
            <img :src="axios.defaults.baseURL + i.image" alt="">
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

#neimage {
  position: absolute;
  bottom: -0.5rem;
  border-radius: 1rem;
  background-color: rgba(0, 0, 0, 0.562);
  width: 100%;
  font-size: x-large;
  /* padding: 0.5rem; */
  color: white;
}
#imagenminiatura{
  width: 7rem;
  margin: 1rem;
}
</style>
<script>
export default {
  data() {
    return {
      images_list: [],
      images_list_mostrar: [],
      search: "",
      image:{
        name:"",
        image:"",
      },
      imagenminiatura: null,
    };
  },
  mounted() {
    this.get_images();
  },
  methods: {

    obtener_image(e) {

      let file = e.target.files[0];
      console.log(file);
      this.image.image = file;
      // this.articles_edit.image = file;

      // console.log("image: "+this.articles);
      // console.log("EDit_image: "+this.articles_edit);

      this.cargarimagen(file);
    },
    cargarimagen(file) {
      let reader = new FileReader();
      reader.onload = (e) => {
        this.imagenminiatura = e.target.result;
      }
      reader.readAsDataURL(file);
    },
    async get_images() {
      let response = await this.axios.get("/api/images");
      this.images_list = response.data;
      this.images_list_mostrar = this.images_list;
    },
    async new_image() {
      console.log(this.image);
      let formData = new FormData();
      formData.append('image', this.image.image);
      formData.append('name', this.image.name);

      let response = await this.axios.post("/api/images/", formData);
      console.log("respondio: "+response.data);
      this.get_images();
      this.image="";
      this.imagenminiatura="";
      

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
  computed: {
    imagen() {
      return this.imagenminiatura
    }
  }
};

</script>