<template>
    <!-- <h1>Images:</h1> -->
    <div id="container-images">
        <div class="mb-3" id="inmages">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile">
            </div>
        <div id="images">
          
            <div id="art-images">
                <article class="article-image">
                    <figure>
                        <img src="https://latarta.com.co/wp-content/uploads/2018/06/default-placeholder.png" alt="">
                    </figure>

                </article>
                <article class="article-image">
                    <figure>
                        <img src="https://latarta.com.co/wp-content/uploads/2018/06/default-placeholder.png" alt="">
                    </figure>

                </article>
                <article class="article-image">
                    <figure>
                        <img src="https://latarta.com.co/wp-content/uploads/2018/06/default-placeholder.png" alt="">
                    </figure>

                </article>
                <article class="article-image">
                    <figure>
                        <img src="https://latarta.com.co/wp-content/uploads/2018/06/default-placeholder.png" alt="">
                    </figure>

                </article>
                <article class="article-image">
                    <figure>
                        <img src="https://latarta.com.co/wp-content/uploads/2018/06/default-placeholder.png" alt="">
                    </figure>

                </article>
                <article class="article-image">
                    <figure>
                        <img src="https://latarta.com.co/wp-content/uploads/2018/06/default-placeholder.png" alt="">
                    </figure>

                </article>
            </div>
        </div>

    </div>
</template>
<style>
/* h1 {
    color: black;
} */
#container-images {
    display: flex;
flex-direction: column;
    width: 100%;
    height: 100%;

}
#inmages{
    position: sticky !important;
 
}
#images {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    overflow-y: scroll;

}
#art-images{
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    height: max-content;
}
.article-image{
    width: 20rem;
    height: 15rem;
    border: 1px solid rgb(15, 141, 78);
    margin: 1rem;
    border-radius: 1rem;
    transition: ease-in-out 100ms;
}
.article-image:hover{
    transform: scale(1.05);
    box-shadow: green 1px 1px 1px 1px, rgba(0, 0, 0, 0.76) 3px 3px 3px;
}
figure{
    width: 100%;
    height: 100%;
}
img{
    width: 100%;
    height: 100%;
    border-radius: 1rem;
}
</style>
<script>


</script>