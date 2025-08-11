<template>
  <div class="home">
    <main>
      <article>
        <section class="welcome-section">
          <h2>欢迎来到我的博客！</h2>
          <p class="post-date">发布于 {{ currentDate }}</p>
          <p>
            这是一个分享技术和生活的现代化博客平台，记录我的学习和创作历程。希望你能在这里找到有用的知识和灵感！
          </p>
        </section>

        <section class="latest-posts">
          <h2>最新文章</h2>
          <article v-for="post in latestPosts" :key="post.id" class="post-item">
            <h3><router-link :to="`/post/${post.id}`">{{ post.title }}</router-link></h3>
            <p class="post-date">发布于 {{ post.date }}</p>
            <p>{{ post.excerpt }}</p>
          </article>
        </section>

        <section class="latest-comments">
          <h2>最新评论</h2>
          <article v-for="comment in latestComments" :key="comment.id" class="comment-item">
            <p><strong>{{ comment.author }}</strong> 于 {{ comment.date }} 评论：</p>
            <blockquote>{{ comment.content }}</blockquote>
          </article>
        </section>
      </article>

      <aside class="sidebar">
        <section class="popular-tags">
          <h3>热门标签</h3>
          <ul>
            <li v-for="tag in popularTags" :key="tag.id">
              <router-link :to="`/tag/${tag.id}`">{{ tag.name }}</router-link>
            </li>
          </ul>
        </section>

        <section class="newsletter">
          <h3>订阅我们的新闻邮件</h3>
          <form @submit.prevent="subscribe">
            <label for="email">邮箱地址</label>
            <input
              type="email"
              id="email"
              v-model="email"
              placeholder="请输入邮箱"
              required
            />
            <button type="submit">订阅</button>
          </form>
        </section>

        <section class="friend-links">
          <h3>友情链接</h3>
          <ul>
            <li v-for="link in friendLinks" :key="link.id">
              <a :href="link.url" target="_blank" rel="noopener">{{ link.name }}</a>
            </li>
          </ul>
        </section>

        <section class="about-me">
          <h3>关于我</h3>
          <p>一名热爱编程和生活的博主，喜欢探索技术的美好，也分享成长的点滴。</p>
          <div class="social-icons" aria-label="社交媒体链接">
            <a v-for="social in socialLinks" 
               :key="social.id"
               :href="social.url" 
               :title="social.name" 
               :aria-label="social.name"
               target="_blank"
               rel="noopener">
              <i :class="social.icon"></i>
            </a>
          </div>
        </section>
      </aside>
    </main>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'

// 响应式数据
const email = ref('')

// 计算属性
const currentDate = computed(() => {
  return new Date().toLocaleDateString('zh-CN', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  })
})

// 模拟数据
const latestPosts = ref([
  {
    id: 1,
    title: '用Vite搭建现代前端项目',
    date: '2025年8月10日',
    excerpt: '介绍如何用Vite快速搭建一个现代化的前端开发环境，提升开发效率和体验。'
  },
  {
    id: 2,
    title: 'Linux下的剪切板管理神器',
    date: '2025年8月9日',
    excerpt: '分享几个Linux系统下实用的剪切板管理工具，帮助提升你的工作效率。'
  }
])

const latestComments = ref([
  {
    id: 1,
    author: '小明',
    date: '2025年8月11日',
    content: '这篇文章讲得很详细，学到了不少，谢谢分享！'
  },
  {
    id: 2,
    author: '小红',
    date: '2025年8月10日',
    content: 'Vite确实很棒，启动速度超级快！'
  }
])

const popularTags = ref([
  { id: 1, name: '前端' },
  { id: 2, name: 'Linux' },
  { id: 3, name: 'JavaScript' },
  { id: 4, name: '生活日记' },
  { id: 5, name: '工具推荐' }
])

const friendLinks = ref([
  { id: 1, name: '示例网站', url: 'https://www.example.com' },
  { id: 2, name: 'GitHub', url: 'https://github.com' },
  { id: 3, name: 'Stack Overflow', url: 'https://stackoverflow.com' }
])

const socialLinks = ref([
  { id: 1, name: '微博', url: '#', icon: 'fab fa-weibo' },
  { id: 2, name: 'GitHub', url: '#', icon: 'fab fa-github' },
  { id: 3, name: 'Twitter', url: '#', icon: 'fab fa-twitter' }
])

// 方法
const subscribe = () => {
  if (email.value) {
    alert(`感谢订阅，邮箱：${email.value}！`)
    email.value = ''
  }
}
</script>

<style scoped>
.home {
  max-width: 960px;
  margin: 2em auto;
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 2em;
  padding: 0 1em;
}

article {
  display: flex;
  flex-direction: column;
  gap: 2em;
}

section {
  background: #fff;
  padding: 1.5em;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h2, h3 {
  color: #ff6b6b;
  margin-top: 0;
  margin-bottom: 1em;
}

h2 {
  font-size: 1.8rem;
  font-weight: 700;
}

h3 {
  font-size: 1.3rem;
  font-weight: 600;
  border-bottom: 2px solid #ff6b6b;
  padding-bottom: 0.3em;
}

.post-date {
  font-size: 0.85rem;
  color: #999;
  margin-bottom: 0.5em;
}

p {
  line-height: 1.6;
  color: #333;
}

.post-item, .comment-item {
  margin-bottom: 1.5em;
  padding-bottom: 1.5em;
  border-bottom: 1px solid #eee;
}

.post-item:last-child, .comment-item:last-child {
  border-bottom: none;
  margin-bottom: 0;
  padding-bottom: 0;
}

.post-item h3 a {
  color: #ff6b6b;
  text-decoration: none;
  font-weight: 600;
}

.post-item h3 a:hover {
  text-decoration: underline;
}

blockquote {
  background: #f8f9fa;
  border-left: 4px solid #ff6b6b;
  padding: 0.5em 1em;
  margin: 0.5em 0;
  font-style: italic;
}

.sidebar {
  display: flex;
  flex-direction: column;
  gap: 1.5em;
  height: fit-content;
}

.sidebar section {
  padding: 1em;
}

ul {
  list-style: none;
  padding-left: 0;
  margin: 0;
}

ul li {
  margin-bottom: 0.7em;
}

ul li a {
  text-decoration: none;
  color: #ff6b6b;
  font-weight: 600;
  transition: color 0.3s ease;
}

ul li a:hover {
  text-decoration: underline;
  color: #e05555;
}

form {
  display: flex;
  flex-direction: column;
}

form label {
  font-weight: 600;
  margin-bottom: 0.3em;
  color: #333;
}

form input[type="email"] {
  padding: 0.5em;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-bottom: 0.8em;
  font-size: 1rem;
  transition: border-color 0.3s ease;
}

form input[type="email"]:focus {
  outline: none;
  border-color: #ff6b6b;
}

form button {
  background: #ff6b6b;
  border: none;
  color: white;
  font-weight: 700;
  padding: 0.6em;
  border-radius: 4px;
  cursor: pointer;
  transition: background 0.3s ease;
}

form button:hover {
  background: #e05555;
}

.social-icons {
  display: flex;
  justify-content: center;
  gap: 1.2em;
  margin-top: 0.5em;
}

.social-icons a {
  color: #ff6b6b;
  font-size: 1.4rem;
  text-decoration: none;
  transition: color 0.3s ease;
}

.social-icons a:hover {
  color: #e05555;
}

/* 响应式设计 */
@media (max-width: 768px) {
  .home {
    grid-template-columns: 1fr;
    margin: 1em;
  }
  
  .sidebar {
    margin-top: 1em;
  }
  
  section {
    padding: 1em;
  }
}
</style>
