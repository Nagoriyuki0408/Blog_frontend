<template>
  <div>
    <Header />
    <main class="content">
      <h3>最新文章</h3>
      <ul>
        <li v-for="post in posts" :key="post.id">{{ post.title }}</li>
      </ul>
    </main>
  </div>
</template>

<script>
import Header from '@/components/Header.vue'

export default {
  name: 'Home',
  components: { Header },
  data() {
    return {
      posts: [
        { id: 1, title: '第一篇博客文章' },
        { id: 2, title: '第二篇博客文章' }
      ]
    }
  }
}
</script>

<style scoped>
.content {
  padding: 1rem;
}
</style>
