<template>
    <div class="container">
        <div class="row d-flex">
            <div class="col-12 d-inline flex-wrap d-flex justify-content-between">
                <div class="row">
                    <div class="card col-3 p-0 m-2 rounded"
                v-for="{title, author, id} in posts" :key="id"

                >
                    <!-- <div class="card-header ">
                        <p>{{author}}</p>
                    </div> -->

                    <div class="card-body">
                        <img class="img-size rounded"
                v-if="img.src.medium != null"
                :src="img.src.medium" alt="">
                <p
                v-else
                >Loading img</p>
                        <!-- <p>{{title}}</p> -->
                    </div>
                </div>
                </div>
                <!-- La chiamata genera un errore di tempistiche di caricamento file e img. valuta di mettere la richiesta al server in un metodo e richiamarlo al caricamento. -->

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
            img: [],
            authorization: '563492ad6f91700001000001f40fc8db6a6f44fda86b5e556138c274',
            basePath: 'https://api.pexels.com/v1/photos/313690',
            }

        },
        props: ['posts'],
        mounted() {
            axios
      .get(this.basePath, {
        headers: {
        'Authorization': this.authorization,
        page: this.page
      }
      })
      .then(response => (this.img = response.data))
        },
    }
</script>
