<template>
    <div class="container">
        <div class="row justify-content-center">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" :href="url">
                    {{ title }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
        
                    </ul>

                    
                </div>
            </div>
        </nav>
       
        </div>
    </div>
</template>

<script>
    export default {
        props:['title', 'url'],
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>
