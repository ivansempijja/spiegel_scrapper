<template>
    <article class="col-12 my-5" v-for="article in articles">
        <div class="row">
            <div class="col-md-7">
                <h5 class="mt-md-2 text-danger">{{ article.title }}</h5>
                <p class="mt-2 mb-4">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo sequi animi maiores, at vero voluptates architecto sit aperiam provident omnis deleniti natus eum ex ad odit voluptate soluta cupiditate ea. Sed laborum veniam voluptatem natus cum ab atque. Aperiam blanditiis distinctio error qui eius accusamus quae ipsa suscipit, harum quos!
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