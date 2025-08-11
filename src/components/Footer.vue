<template>
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-content">
        <div class="footer-section">
          <h3>关于博客</h3>
          <p>一个现代化的技术博客平台，分享编程技术、生活感悟和成长历程。</p>
        </div>
        
        <div class="footer-section">
          <h3>快速链接</h3>
          <ul>
            <li><router-link to="/">首页</router-link></li>
            <li><router-link to="/tech">技术文章</router-link></li>
            <li><router-link to="/life">生活随笔</router-link></li>
            <li><router-link to="/about">关于我</router-link></li>
          </ul>
        </div>
        
        <div class="footer-section">
          <h3>联系方式</h3>
          <div class="social-links">
            <a href="#" title="GitHub" aria-label="GitHub">
              <i class="fab fa-github"></i>
            </a>
            <a href="#" title="微博" aria-label="微博">
              <i class="fab fa-weibo"></i>
            </a>
            <a href="#" title="邮箱" aria-label="邮箱">
              <i class="fas fa-envelope"></i>
            </a>
          </div>
        </div>
      </div>
      
      <div class="footer-bottom">
        <p>&copy; {{ currentYear }} My Blog. 保留所有权利。</p>
        <p>Made with ❤️ using Vue.js</p>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { computed } from 'vue'

const currentYear = computed(() => new Date().getFullYear())
</script>

<style scoped>
.footer {
  background: #2c3e50;
  color: #ecf0f1;
  padding: 3rem 0 1rem;
  margin-top: 4rem;
}

.footer-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
}

.footer-content {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  margin-bottom: 2rem;
}

.footer-section h3 {
  color: #ff6b6b;
  margin-bottom: 1rem;
  font-size: 1.2rem;
  font-weight: 600;
}

.footer-section p {
  line-height: 1.6;
  color: #bdc3c7;
}

.footer-section ul {
  list-style: none;
  padding: 0;
}

.footer-section ul li {
  margin-bottom: 0.5rem;
}

.footer-section ul li a {
  color: #bdc3c7;
  text-decoration: none;
  transition: color 0.3s ease;
}

.footer-section ul li a:hover {
  color: #ff6b6b;
}

.social-links {
  display: flex;
  gap: 1rem;
}

.social-links a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  background: #34495e;
  color: #ecf0f1;
  border-radius: 50%;
  text-decoration: none;
  transition: all 0.3s ease;
}

.social-links a:hover {
  background: #ff6b6b;
  transform: translateY(-2px);
}

.footer-bottom {
  border-top: 1px solid #34495e;
  padding-top: 1rem;
  text-align: center;
  color: #95a5a6;
  font-size: 0.9rem;
}

.footer-bottom p {
  margin: 0.5rem 0;
}

/* 响应式设计 */
@media (max-width: 768px) {
  .footer {
    padding: 2rem 0 1rem;
  }
  
  .footer-container {
    padding: 0 1rem;
  }
  
  .footer-content {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
  
  .social-links {
    justify-content: center;
  }
}
</style>
