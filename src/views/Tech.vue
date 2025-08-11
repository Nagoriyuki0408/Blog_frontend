<template>
  <div class="tech-page">
    <div class="page-header">
      <h1>技术文章</h1>
      <p>分享前端、后端、运维等各类技术文章和教程</p>
    </div>
    
    <div class="content-container">
      <main class="main-content">
        <div class="filter-bar">
          <div class="search-box">
            <input 
              type="text" 
              v-model="searchQuery" 
              placeholder="搜索文章..."
              @input="filterPosts"
            />
            <i class="fas fa-search"></i>
          </div>
          
          <div class="category-filter">
            <button 
              v-for="category in categories" 
              :key="category.id"
              :class="['filter-btn', { active: selectedCategory === category.id }]"
              @click="selectCategory(category.id)"
            >
              {{ category.name }}
            </button>
          </div>
        </div>
        
        <div class="posts-grid">
          <article 
            v-for="post in filteredPosts" 
            :key="post.id" 
            class="post-card"
            @click="viewPost(post.id)"
          >
            <div class="post-image">
              <img :src="post.image" :alt="post.title" />
              <div class="post-category">{{ post.category }}</div>
            </div>
            
            <div class="post-content">
              <h3>{{ post.title }}</h3>
              <p class="post-excerpt">{{ post.excerpt }}</p>
              
              <div class="post-meta">
                <span class="post-date">
                  <i class="far fa-calendar"></i>
                  {{ post.date }}
                </span>
                <span class="post-views">
                  <i class="far fa-eye"></i>
                  {{ post.views }} 阅读
                </span>
              </div>
              
              <div class="post-tags">
                <span 
                  v-for="tag in post.tags" 
                  :key="tag" 
                  class="tag"
                >
                  {{ tag }}
                </span>
              </div>
            </div>
          </article>
        </div>
        
        <div v-if="filteredPosts.length === 0" class="no-results">
          <i class="fas fa-search"></i>
          <p>没有找到相关文章</p>
        </div>
      </main>
      
      <aside class="sidebar">
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
        
        <section class="categories">
          <h3>文章分类</h3>
          <ul>
            <li v-for="category in categories" :key="category.id">
              <a href="#" @click.prevent="selectCategory(category.id)">
                {{ category.name }}
                <span class="count">({{ category.count }})</span>
              </a>
            </li>
          </ul>
        </section>
      </aside>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const searchQuery = ref('')
const selectedCategory = ref('all')

// 模拟数据
const posts = ref([
  {
    id: 1,
    title: 'Vue 3 Composition API 完全指南',
    excerpt: '深入理解Vue 3的Composition API，掌握现代Vue开发的最佳实践...',
    content: '详细内容...',
    category: '前端',
    date: '2025-01-15',
    views: 1250,
    tags: ['Vue', 'JavaScript', '前端'],
    image: '/images/vue3.jpg'
  },
  {
    id: 2,
    title: 'Node.js 性能优化实战',
    excerpt: '从内存管理到异步处理，全面解析Node.js性能优化技巧...',
    content: '详细内容...',
    category: '后端',
    date: '2025-01-12',
    views: 980,
    tags: ['Node.js', '性能优化', '后端'],
    image: '/images/nodejs.jpg'
  },
  {
    id: 3,
    title: 'Docker 容器化部署最佳实践',
    excerpt: '从开发到生产，Docker容器化部署的完整流程和注意事项...',
    content: '详细内容...',
    category: '运维',
    date: '2025-01-10',
    views: 756,
    tags: ['Docker', '部署', '运维'],
    image: '/images/docker.jpg'
  },
  {
    id: 4,
    title: 'TypeScript 高级类型系统',
    excerpt: '掌握TypeScript的高级类型特性，提升代码的类型安全性...',
    content: '详细内容...',
    category: '前端',
    date: '2025-01-08',
    views: 1100,
    tags: ['TypeScript', '前端'],
    image: '/images/typescript.jpg'
  }
])

const categories = ref([
  { id: 'all', name: '全部', count: 4 },
  { id: 'frontend', name: '前端', count: 2 },
  { id: 'backend', name: '后端', count: 1 },
  { id: 'devops', name: '运维', count: 1 }
])

const popularPosts = ref([
  { id: 1, title: 'Vue 3 Composition API 完全指南', views: 1250 },
  { id: 4, title: 'TypeScript 高级类型系统', views: 1100 },
  { id: 2, title: 'Node.js 性能优化实战', views: 980 }
])

// 计算属性
const filteredPosts = computed(() => {
  let filtered = posts.value
  
  // 按分类过滤
  if (selectedCategory.value !== 'all') {
    const categoryMap = {
      'frontend': '前端',
      'backend': '后端',
      'devops': '运维'
    }
    filtered = filtered.filter(post => post.category === categoryMap[selectedCategory.value])
  }
  
  // 按搜索关键词过滤
  if (searchQuery.value) {
    const query = searchQuery.value.toLowerCase()
    filtered = filtered.filter(post => 
      post.title.toLowerCase().includes(query) ||
      post.excerpt.toLowerCase().includes(query) ||
      post.tags.some(tag => tag.toLowerCase().includes(query))
    )
  }
  
  return filtered
})

// 方法
const filterPosts = () => {
  // 搜索功能已通过计算属性实现
}

const selectCategory = (categoryId) => {
  selectedCategory.value = categoryId
}

const viewPost = (postId) => {
  router.push(`/post/${postId}`)
}

onMounted(() => {
  // 组件挂载后的初始化逻辑
})
</script>

<style scoped>
.tech-page {
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

.filter-bar {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  background: white;
  padding: 1.5rem;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.search-box {
  position: relative;
}

.search-box input {
  width: 100%;
  padding: 0.8rem 1rem 0.8rem 2.5rem;
  border: 1px solid #ddd;
  border-radius: 6px;
  font-size: 1rem;
  transition: border-color 0.3s ease;
}

.search-box input:focus {
  border-color: #ff6b6b;
  outline: none;
}

.search-box i {
  position: absolute;
  left: 1rem;
  top: 50%;
  transform: translateY(-50%);
  color: #999;
}

.category-filter {
  display: flex;
  gap: 0.5rem;
  flex-wrap: wrap;
}

.filter-btn {
  padding: 0.5rem 1rem;
  border: 1px solid #ddd;
  background: white;
  border-radius: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
  font-size: 0.9rem;
}

.filter-btn:hover {
  border-color: #ff6b6b;
  color: #ff6b6b;
}

.filter-btn.active {
  background: #ff6b6b;
  color: white;
  border-color: #ff6b6b;
}

.posts-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 2rem;
}

.post-card {
  background: white;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
}

.post-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

.post-image {
  position: relative;
  height: 200px;
  background: #f0f0f0;
  overflow: hidden;
}

.post-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.post-category {
  position: absolute;
  top: 1rem;
  left: 1rem;
  background: #ff6b6b;
  color: white;
  padding: 0.3rem 0.8rem;
  border-radius: 15px;
  font-size: 0.8rem;
  font-weight: 600;
}

.post-content {
  padding: 1.5rem;
}

.post-content h3 {
  color: #2c3e50;
  font-size: 1.2rem;
  margin-bottom: 0.8rem;
  line-height: 1.4;
}

.post-excerpt {
  color: #7f8c8d;
  line-height: 1.6;
  margin-bottom: 1rem;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.post-meta {
  display: flex;
  gap: 1rem;
  margin-bottom: 1rem;
  font-size: 0.85rem;
  color: #95a5a6;
}

.post-meta span {
  display: flex;
  align-items: center;
  gap: 0.3rem;
}

.post-tags {
  display: flex;
  gap: 0.5rem;
  flex-wrap: wrap;
}

.tag {
  background: #f8f9fa;
  color: #6c757d;
  padding: 0.2rem 0.6rem;
  border-radius: 12px;
  font-size: 0.8rem;
}

.no-results {
  text-align: center;
  padding: 3rem;
  color: #7f8c8d;
}

.no-results i {
  font-size: 3rem;
  margin-bottom: 1rem;
  color: #ddd;
}

.sidebar {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.sidebar section {
  background: white;
  padding: 1.5rem;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.sidebar h3 {
  color: #2c3e50;
  margin-bottom: 1rem;
  font-size: 1.2rem;
  font-weight: 600;
  border-bottom: 2px solid #ff6b6b;
  padding-bottom: 0.5rem;
}

.sidebar ul {
  list-style: none;
  padding: 0;
}

.sidebar ul li {
  margin-bottom: 1rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid #eee;
}

.sidebar ul li:last-child {
  border-bottom: none;
  margin-bottom: 0;
  padding-bottom: 0;
}

.sidebar ul li a {
  text-decoration: none;
  color: #2c3e50;
  display: block;
}

.sidebar ul li a:hover h4 {
  color: #ff6b6b;
}

.sidebar ul li h4 {
  font-size: 0.95rem;
  margin-bottom: 0.3rem;
  line-height: 1.4;
  transition: color 0.3s ease;
}

.views {
  font-size: 0.8rem;
  color: #95a5a6;
}

.categories ul li a {
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #2c3e50;
  text-decoration: none;
  transition: color 0.3s ease;
}

.categories ul li a:hover {
  color: #ff6b6b;
}

.count {
  color: #95a5a6;
  font-size: 0.9rem;
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
  .tech-page {
    padding: 0 1rem;
  }
  
  .page-header h1 {
    font-size: 2rem;
  }
  
  .posts-grid {
    grid-template-columns: 1fr;
  }
  
  .category-filter {
    justify-content: center;
  }
}
</style>
