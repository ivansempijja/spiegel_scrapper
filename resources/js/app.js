
import './bootstrap';
import '../sass/app.scss';

import { createApp } from "vue";
import ArticleList from "./components/articleList.vue"; 


const app = createApp();
app.component('article-list', ArticleList);
app.mount("#app");
