<template>
    <div class="container-fluid">

        <Loader v-if="isLoading" class="m-5 p-5"/>

        <div v-if="posts.length" class="d-flex flex-column justify-content-center align-items-center">
            <div class="card text-center d-flex mt-5" v-for="post in posts" :key="post.id" style="width: 80rem">
                <img :src="post.image" class="card-img-top mt-3" :alt="post.title" style="width: 20rem; align-self: center">
                <div class="card-body">
                    <h2 class="card-title lead font-weight-bold">{{post.title}}</h2>
                    <span>Categoria: {{post.category.label}}</span>
                    <br>
                    <span v-for="tag in post.tags" :key="tag.id" class="badge badge-pill text-light m-1" :style="`background-color: ${tag.color}`">{{tag.label}}</span>
                    <p class="card-text text-justify p-3">{{post.content}}</p>

                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->

                </div>
            </div>
        </div>

        <span v-else>Non ci sono post</span>

    </div>
</template>

<script>

import axios from 'axios';
import Loader from '../posts/Loader.vue';

export default{
    name: 'PostsList',
    components: {
        Loader
    },
    data(){
        return{
            posts: [],
            isLoading: true
        }
    },
    methods: {
        getPosts(){
            axios.get("http://127.0.0.1:8000/api/posts")
            .then( (res) => {
                console.log(res.data);
                this.posts = res.data.posts;
            } ).then( ()=>{
                this.isLoading = false;
            } )
        }
    },
    mounted(){
        this.getPosts();
    }
}
</script>

<style scoped>
    h1 {
        color: turquoise;
    }
</style>
