<template>
  <div class="life-page">
    <div class="page-header">
      <h1>生活随笔</h1>
      <p>记录生活中的点滴感悟，分享成长的心路历程</p>
    </div>
    
    <div class="content-container">
      <main class="main-content">
        <div class="posts-list">
          <article 
            v-for="post in lifePosts" 
            :key="post.id" 
            class="life-post"
            @click="viewPost(post.id)"
          >
            <div class="post-header">
              <h2>{{ post.title }}</h2>
              <div class="post-meta">
                <span class="post-date">
                  <i class="far fa-calendar"></i>
                  {{ post.date }}
                </span>
                <span class="post-mood">
                  <i class="far fa-smile"></i>
                  {{ post.mood }}
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
                >
                  {{ tag }}
                </span>
              </div>
            </div>
            
            <div class="post-footer">
              <div class="post-stats">
                <span class="likes">
                  <i class="far fa-heart"></i>
                  {{ post.likes }}
                </span>
                <span class="comments">
                  <i class="far fa-comment"></i>
                  {{ post.comments }}
                </span>
              </div>
              
              <button class="read-more" @click.stop="viewPost(post.id)">
                阅读全文
                <i class="fas fa-arrow-right"></i>
              </button>
            </div>
          </article>
        </div>
        
        <div class="pagination">
          <button 
            class="page-btn" 
            :disabled="currentPage === 1"
            @click="changePage(currentPage - 1)"
          >
            <i class="fas fa-chevron-left"></i>
            上一页
          </button>
          
          <span class="page-info">{{ currentPage }} / {{ totalPages }}</span>
          
          <button 
            class="page-btn" 
            :disabled="currentPage === totalPages"
            @click="changePage(currentPage + 1)"
          >
            下一页
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </main>
      
      <aside class="sidebar">
        <section class="mood-stats">
          <h3>心情统计</h3>
          <div class="mood-chart">
            <div 
              v-for="mood in moodStats" 
              :key="mood.name"
              class="mood-item"
            >
              <span class="mood-name">{{ mood.name }}</span>
              <div class="mood-bar">
                <div 
                  class="mood-fill" 
                  :style="{ width: mood.percentage + '%', backgroundColor: mood.color }"
                ></div>
              </div>
              <span class="mood-count">{{ mood.count }}</span>
            </div>
          </div>
        </section>
        
        <section class="recent-posts">
          <h3>最近随笔</h3>
          <ul>
            <li v-for="post in recentPosts" :key="post.id">
              <router-link :to="`/post/${post.id}`">
                <h4>{{ post.title }}</h4>
                <span class="date">{{ post.date }}</span>
              </router-link>
            </li>
          </ul>
        </section>
        
        <section class="life-quotes">
          <h3>生活感悟</h3>
          <div class="quote">
            <blockquote>
              "生活不是等待暴风雨过去，而是学会在雨中跳舞。"
            </blockquote>
            <cite>— 维维安·格林</cite>
          </div>
        </section>
      </aside>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const currentPage = ref(1)
const postsPerPage = 5

// 模拟数据
const lifePosts = ref([
  {
    id: 1,
    title: '第一次独自旅行的感悟',
    excerpt: '人生第一次独自踏上旅途，从最初的忐忑不安到后来的从容淡定，这次旅行让我学会了独立和勇敢...',
    content: '详细内容...',
    date: '2025-01-15',
    mood: '兴奋',
    likes: 45,
    comments: 12,
    tags: ['旅行', '成长', '独立']
  },
  {
    id: 2,
    title: '与老友重逢的温暖时光',
    excerpt: '多年未见的老友突然造访，那些曾经的回忆如潮水般涌来，原来真正的友谊经得起时间的考验...',
    content: '详细内容...',
    date: '2025-01-12',
    mood: '温暖',
    likes: 38,
    comments: 8,
    tags: ['友情', '回忆', '温暖']
  },
  {
    id: 3,
    title: '学会放慢脚步',
    excerpt: '在这个快节奏的时代，我们总是被各种deadline追赶着，但偶尔放慢脚步，会发现生活中被忽略的美好...',
    content: '详细内容...',
    date: '2025-01-10',
    mood: '平静',
    likes: 52,
    comments: 15,
    tags: ['生活', '慢生活', '感悟']
  },
  {
    id: 4,
    title: '深夜的思考时光',
    excerpt: '每当夜深人静的时候，总会有一些想法在脑海中浮现，这些深夜的思考往往是最真实的自己...',
    content: '详细内容...',
    date: '2025-01-08',
    mood: '思考',
    likes: 29,
    comments: 6,
    tags: ['思考', '深夜', '自我']
  },
  {
    id: 5,
    title: '重新开始的力量',
    excerpt: '有时候，重新开始需要很大的勇气，但当你真正迈出那一步时，你会发现新的可能性...',
    content: '详细内容...',
    date: '2025-01-05',
    mood: '勇敢',
    likes: 41,
    comments: 10,
    tags: ['重新开始', '勇气', '改变']
  }
])

const moodStats = ref([
  { name: '开心', count: 15, percentage: 30, color: '#ff6b6b' },
  { name: '温暖', count: 12, percentage: 24, color: '#ffa726' },
  { name: '平静', count: 10, percentage: 20, color: '#66bb6a' },
  { name: '思考', count: 8, percentage: 16, color: '#42a5f5' },
  { name: '勇敢', count: 5, percentage: 10, color: '#ab47bc' }
])

const recentPosts = ref([
  { id: 1, title: '第一次独自旅行的感悟', date: '2025-01-15' },
  { id: 2, title: '与老友重逢的温暖时光', date: '2025-01-12' },
  { id: 3, title: '学会放慢脚步', date: '2025-01-10' }
])

// 计算属性
const totalPages = computed(() => Math.ceil(lifePosts.value.length / postsPerPage))

const paginatedPosts = computed(() => {
  const start = (currentPage.value - 1) * postsPerPage
  const end = start + postsPerPage
  return lifePosts.value.slice(start, end)
})

// 方法
const viewPost = (postId) => {
  router.push(`/post/${postId}`)
}

const changePage = (page) => {
  if (page >= 1 && page <= totalPages.value) {
    currentPage.value = page
    window.scrollTo({ top: 0, behavior: 'smooth' })
  }
}
</script>

<style scoped>
.life-page {
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

.life-post {
  background: white;
  border-radius: 12px;
  padding: 2rem;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
  border-left: 4px solid #ff6b6b;
}

.life-post:hover {
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
  transition: background-color 0.3s ease;
}

.tag:hover {
  background: #ff6b6b;
  color: white;
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

.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 1rem;
  margin-top: 2rem;
}

.page-btn {
  background: white;
  border: 1px solid #ddd;
  padding: 0.8rem 1.2rem;
  border-radius: 6px;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.9rem;
}

.page-btn:hover:not(:disabled) {
  border-color: #ff6b6b;
  color: #ff6b6b;
}

.page-btn:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.page-info {
  font-weight: 600;
  color: #2c3e50;
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

.mood-chart {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.mood-item {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.mood-name {
  min-width: 40px;
  font-size: 0.9rem;
  color: #2c3e50;
}

.mood-bar {
  flex: 1;
  height: 8px;
  background: #f0f0f0;
  border-radius: 4px;
  overflow: hidden;
}

.mood-fill {
  height: 100%;
  border-radius: 4px;
  transition: width 0.3s ease;
}

.mood-count {
  min-width: 30px;
  text-align: right;
  font-size: 0.85rem;
  color: #7f8c8d;
}

.recent-posts ul {
  list-style: none;
  padding: 0;
}

.recent-posts ul li {
  margin-bottom: 1rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid #eee;
}

.recent-posts ul li:last-child {
  border-bottom: none;
  margin-bottom: 0;
  padding-bottom: 0;
}

.recent-posts ul li a {
  text-decoration: none;
  color: #2c3e50;
  display: block;
}

.recent-posts ul li a:hover h4 {
  color: #ff6b6b;
}

.recent-posts ul li h4 {
  font-size: 0.95rem;
  margin-bottom: 0.3rem;
  line-height: 1.4;
  transition: color 0.3s ease;
}

.date {
  font-size: 0.8rem;
  color: #95a5a6;
}

.life-quotes .quote {
  text-align: center;
}

.life-quotes blockquote {
  font-style: italic;
  color: #2c3e50;
  font-size: 1.1rem;
  line-height: 1.6;
  margin-bottom: 1rem;
  padding: 1rem;
  background: #f8f9fa;
  border-radius: 8px;
  border-left: 4px solid #ff6b6b;
}

.life-quotes cite {
  color: #7f8c8d;
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
  .life-page {
    padding: 0 1rem;
  }
  
  .page-header h1 {
    font-size: 2rem;
  }
  
  .life-post {
    padding: 1.5rem;
  }
  
  .post-footer {
    flex-direction: column;
    gap: 1rem;
    align-items: flex-start;
  }
  
  .pagination {
    flex-direction: column;
    gap: 0.5rem;
  }
}
</style>
