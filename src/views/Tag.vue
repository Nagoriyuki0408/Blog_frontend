<template>
  <div class="tag-page">
    <div class="page-header">
      <h1>标签: {{ tagName }}</h1>
      <p>共找到 {{ filteredPosts.length }} 篇文章</p>
    </div>
    
    <div class="content-container">
      <main class="main-content">
        <div class="posts-list">
          <article 
            v-for="post in filteredPosts" 
            :key="post.id" 
            class="post-item"
            @click="viewPost(post.id)"
          >
            <div class="post-header">
              <h2>{{ post.title }}</h2>
              <div class="post-meta">
                <span class="post-date">
                  <i class="far fa-calendar"></i>
                  {{ post.date }}
                </span>
                <span class="post-category">
                  <i class="far fa-folder"></i>
                  {{ post.category }}
                </span>
              </div>
            </div>
            
            <div class="post-content">
              <p class="post-excerpt">{{ post.excerpt }}</p>
              
              <div class="post-tags">
                <span 
                  v-for="tag in post.tags" 
                  :key="tag" 
                  class="tag"
                  :class="{ 'active': tag === tagName }"
                >
                  {{ tag }}
                </span>
              </div>
            </div>
            
            <div class="post-footer">
              <div class="post-stats">
                <span class="views">
                  <i class="far fa-eye"></i>
                  {{ post.views }} 阅读
                </span>
                <span class="likes">
                  <i class="far fa-heart"></i>
                  {{ post.likes }}
                </span>
              </div>
              
              <button class="read-more" @click.stop="viewPost(post.id)">
                阅读全文
                <i class="fas fa-arrow-right"></i>
              </button>
            </div>
          </article>
        </div>
        
        <div v-if="filteredPosts.length === 0" class="no-results">
          <i class="fas fa-search"></i>
          <p>没有找到相关文章</p>
          <router-link to="/" class="back-home">
            返回首页
          </router-link>
        </div>
      </main>
      
      <aside class="sidebar">
        <section class="related-tags">
          <h3>相关标签</h3>
          <div class="tags-cloud">
            <router-link 
              v-for="tag in relatedTags" 
              :key="tag.name"
              :to="`/tag/${tag.name}`"
              class="tag-link"
              :style="{ fontSize: tag.size + 'rem' }"
            >
              {{ tag.name }}
            </router-link>
          </div>
        </section>
        
        <section class="popular-posts">
          <h3>热门文章</h3>
          <ul>
            <li v-for="post in popularPosts" :key="post.id">
              <router-link :to="`/post/${post.id}`">
                <h4>{{ post.title }}</h4>
                <span class="views">{{ post.views }} 阅读</span>
              </router-link>
            </li>
          </ul>
        </section>
      </aside>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()

const tagName = computed(() => route.params.id)

// 模拟数据
const allPosts = ref([
  {
    id: 1,
    title: 'Vue 3 Composition API 完全指南',
    excerpt: '深入理解Vue 3的Composition API，掌握现代Vue开发的最佳实践...',
    category: '前端',
    date: '2025-01-15',
    views: 1250,
    likes: 45,
    tags: ['Vue', 'JavaScript', '前端']
  },
  {
    id: 2,
    title: 'Node.js 性能优化实战',
    excerpt: '从内存管理到异步处理，全面解析Node.js性能优化技巧...',
    category: '后端',
    date: '2025-01-12',
    views: 980,
    likes: 38,
    tags: ['Node.js', '性能优化', '后端']
  },
  {
    id: 3,
    title: 'TypeScript 高级类型系统',
    excerpt: '掌握TypeScript的高级类型特性，提升代码的类型安全性...',
    category: '前端',
    date: '2025-01-08',
    views: 1100,
    likes: 52,
    tags: ['TypeScript', '前端', 'JavaScript']
  },
  {
    id: 4,
    title: '第一次独自旅行的感悟',
    excerpt: '人生第一次独自踏上旅途，从最初的忐忑不安到后来的从容淡定...',
    category: '生活',
    date: '2025-01-15',
    views: 756,
    likes: 29,
    tags: ['旅行', '成长', '独立']
  }
])

const relatedTags = ref([
  { name: 'Vue', size: 1.2 },
  { name: 'JavaScript', size: 1.4 },
  { name: '前端', size: 1.6 },
  { name: 'Node.js', size: 1.1 },
  { name: 'TypeScript', size: 1.3 },
  { name: '旅行', size: 1.0 },
  { name: '成长', size: 1.1 }
])

const popularPosts = ref([
  { id: 1, title: 'Vue 3 Composition API 完全指南', views: 1250 },
  { id: 3, title: 'TypeScript 高级类型系统', views: 1100 },
  { id: 2, title: 'Node.js 性能优化实战', views: 980 }
])

// 计算属性
const filteredPosts = computed(() => {
  return allPosts.value.filter(post => 
    post.tags.some(tag => tag.toLowerCase() === tagName.value.toLowerCase())
  )
})

// 方法
const viewPost = (postId) => {
  router.push(`/post/${postId}`)
}

onMounted(() => {
  // 可以在这里添加页面加载逻辑
})
</script>

<style scoped>
.tag-page {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
}

.page-header {
  text-align: center;
  margin: 2rem 0 3rem;
}

.page-header h1 {
  color: #2c3e50;
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
}

.page-header p {
  color: #7f8c8d;
  font-size: 1.1rem;
}

.content-container {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 3rem;
}

.main-content {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.posts-list {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.post-item {
  background: white;
  border-radius: 12px;
  padding: 2rem;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
  border-left: 4px solid #ff6b6b;
}

.post-item:hover {
  transform: translateY(-3px);
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
}

.post-header h2 {
  color: #2c3e50;
  font-size: 1.5rem;
  font-weight: 600;
  margin-bottom: 1rem;
  line-height: 1.4;
}

.post-meta {
  display: flex;
  gap: 1.5rem;
  margin-bottom: 1.5rem;
  font-size: 0.9rem;
  color: #7f8c8d;
}

.post-meta span {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.post-content {
  margin-bottom: 1.5rem;
}

.post-excerpt {
  color: #34495e;
  line-height: 1.7;
  font-size: 1rem;
  margin-bottom: 1rem;
}

.post-tags {
  display: flex;
  gap: 0.5rem;
  flex-wrap: wrap;
}

.tag {
  background: #f8f9fa;
  color: #6c757d;
  padding: 0.3rem 0.8rem;
  border-radius: 15px;
  font-size: 0.85rem;
  transition: all 0.3s ease;
}

.tag:hover {
  background: #ff6b6b;
  color: white;
}

.tag.active {
  background: #ff6b6b;
  color: white;
  font-weight: 600;
}

.post-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 1rem;
  border-top: 1px solid #eee;
}

.post-stats {
  display: flex;
  gap: 1.5rem;
  font-size: 0.9rem;
  color: #7f8c8d;
}

.post-stats span {
  display: flex;
  align-items: center;
  gap: 0.3rem;
}

.read-more {
  background: #ff6b6b;
  color: white;
  border: none;
  padding: 0.6rem 1.2rem;
  border-radius: 20px;
  font-size: 0.9rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.read-more:hover {
  background: #e05555;
  transform: translateX(3px);
}

.no-results {
  text-align: center;
  padding: 4rem 2rem;
  color: #7f8c8d;
}

.no-results i {
  font-size: 4rem;
  margin-bottom: 1rem;
  color: #ddd;
}

.no-results p {
  font-size: 1.2rem;
  margin-bottom: 2rem;
}

.back-home {
  display: inline-block;
  background: #ff6b6b;
  color: white;
  padding: 0.8rem 1.5rem;
  border-radius: 25px;
  text-decoration: none;
  font-weight: 600;
  transition: background 0.3s ease;
}

.back-home:hover {
  background: #e05555;
}

.sidebar {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.sidebar section {
  background: white;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
}

.sidebar h3 {
  color: #2c3e50;
  margin-bottom: 1.5rem;
  font-size: 1.2rem;
  font-weight: 600;
  border-bottom: 2px solid #ff6b6b;
  padding-bottom: 0.5rem;
}

.tags-cloud {
  display: flex;
  flex-wrap: wrap;
  gap: 0.8rem;
}

.tag-link {
  background: #f8f9fa;
  color: #6c757d;
  padding: 0.4rem 0.8rem;
  border-radius: 15px;
  text-decoration: none;
  transition: all 0.3s ease;
  font-weight: 500;
}

.tag-link:hover {
  background: #ff6b6b;
  color: white;
  transform: translateY(-2px);
}

.popular-posts ul {
  list-style: none;
  padding: 0;
}

.popular-posts ul li {
  margin-bottom: 1rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid #eee;
}

.popular-posts ul li:last-child {
  border-bottom: none;
  margin-bottom: 0;
  padding-bottom: 0;
}

.popular-posts ul li a {
  text-decoration: none;
  color: #2c3e50;
  display: block;
}

.popular-posts ul li a:hover h4 {
  color: #ff6b6b;
}

.popular-posts ul li h4 {
  font-size: 0.95rem;
  margin-bottom: 0.3rem;
  line-height: 1.4;
  transition: color 0.3s ease;
}

.views {
  font-size: 0.8rem;
  color: #95a5a6;
}

/* 响应式设计 */
@media (max-width: 1024px) {
  .content-container {
    grid-template-columns: 1fr;
  }
  
  .sidebar {
    order: -1;
  }
}

@media (max-width: 768px) {
  .tag-page {
    padding: 0 1rem;
  }
  
  .page-header h1 {
    font-size: 2rem;
  }
  
  .post-item {
    padding: 1.5rem;
  }
  
  .post-footer {
    flex-direction: column;
    gap: 1rem;
    align-items: flex-start;
  }
  
  .tags-cloud {
    justify-content: center;
  }
}
</style>
