import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import Post from "../views/Post.vue";
import About from "../views/About.vue";

const routes = [
  { path: "/", component: Home },
  { path: "/post/:id", component: Post },
  { path: "/about", component: About },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
