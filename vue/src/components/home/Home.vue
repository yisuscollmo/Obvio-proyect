<template >

    <div class="container-body">
        <div class="banner-text">
            <div class="text-area">
                <span>O</span>
                <span>B</span>
                <span>V</span>
                <span>I</span>
                <span>O</span>
              
                
            </div>

            <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, temporibus labore.
                Rerum ipsa autem, eveniet libero sequi eos beatae id quidem, magni dolorum dolorem esse et est velit
                neque officiis?
            </p>

        </div>

          carusel//



            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active" v-for="i in images_list">
                  <img :src="axios.defaults.baseURL +i.image" class="d-block w-100" alt="...">
                </div>
                
              
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

</div>






</template>
<style scoped>
@import url(/src\assets\styles\home.css);
</style>
<script>
export default {
  data() {
    return {
      images_list: [],
    
    };
  },
  mounted() {
    this.get_images();
  },
  methods: {
    async get_images() {
      let response = await this.axios.get("/api/images");
      this.images_list = response.data;
    
    },
   
   
  },
};

</script>
