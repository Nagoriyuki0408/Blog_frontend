<template>
    <div>
        <div v-for="post in posts" :key="post.id" class="post-preview">
            <router-link :to="`/post/${post.id}`">
                <h2>{{ post.title }}</h2>
                <p>{{ post.summary }}</p>
            </router-link>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const posts = ref([]);

onMounted(async () => {
    // 假设后端接口为 /api/posts
    const res = await axios.get("/api/posts");
    posts.value = res.data;
});
</script>

<style scoped>
.post-preview {
    background: #fff;
    margin-bottom: 1em;
    padding: 1em;
    border-radius: 6px;
    box-shadow: 0 2px 8px #eee;
}
</style>
