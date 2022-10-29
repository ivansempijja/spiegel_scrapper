<template>
    <article class="col-12 my-5" v-for="article in articles">
        <div class="row">
            <div class="col-md-7">
                <a :href='`${article.article_link}`' target="_blank">
                    <h5 class="mt-md-2">{{ article.title }}</h5>
                </a>    
                <p class="mt-2 mb-4">
                    {{ article.excerpt }}
                </p>
                <span>
                    <p class="text-muted">{{ article.article_date }}</p>
                </span>
            </div>
            <div class="col-md-5">
                <img :src='`${article.image_url}`' width="340" alt="article_image">
            </div>
        </div>        
    </article>   
</template>

<script>
import axios from 'axios';

export default{
    data() {
        return {
            articles: []
        }
    },

    methods: {
        getArticles() {
            axios.get("/api/articles").then((response) => {
                this.articles = response.data.data
            })
        }
    },

    mounted() {
        this.getArticles()
    }
}
</script>