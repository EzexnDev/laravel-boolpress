<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="{title, author, id} in posts" :key="id">
                    <div class="card-header">{{title}}</div>
                    <div class="card-body">
                        {{author}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:["posts"],
        mounted() {
            // var app = @json($posts);
            // console.log(vars);
            console.log(this.posts)
        }
    }
</script>
