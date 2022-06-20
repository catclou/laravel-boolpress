<template>
    <div class="container-fluid">
        <div class="row">
            
                    <Header/>
                    <PostList/>
                
        </div>
    </div>
</template>

<script>

    import Header from './Header.vue'
    import PostList from './posts/PostList.vue'

    export default {
        name: "App",
        components: {
            Header,
            PostList
        }
    }

</script>
