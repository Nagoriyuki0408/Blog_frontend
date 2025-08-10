<template>
    <div v-if="post">
        <h1>{{ post.title }}</h1>
        <div v-html="post.content"></div>
    </div>
    <div v-else>加载中...</div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";
import axios from "axios";

const route = useRoute();
const post = ref(null);

onMounted(async () => {
    const res = await axios.get(`/api/posts/${route.params.id}`);
    post.value = res.data;
});
</script>
