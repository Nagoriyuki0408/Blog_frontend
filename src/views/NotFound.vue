<template>
  <div class="not-found">
    <div class="error-container">
      <div class="error-content">
        <div class="error-number">404</div>
        <h1>页面未找到</h1>
        <p>抱歉，您访问的页面不存在或已被移除。</p>
        
        <div class="error-actions">
          <router-link to="/" class="btn-primary">
            <i class="fas fa-home"></i>
            返回首页
          </router-link>
          <button @click="goBack" class="btn-secondary">
            <i class="fas fa-arrow-left"></i>
            返回上页
          </button>
        </div>
        
        <div class="suggestions">
          <h3>您可能感兴趣的内容：</h3>
          <div class="suggestion-links">
            <router-link to="/tech" class="suggestion-link">
              <i class="fas fa-code"></i>
              技术文章
            </router-link>
            <router-link to="/life" class="suggestion-link">
              <i class="fas fa-heart"></i>
              生活随笔
            </router-link>
            <router-link to="/about" class="suggestion-link">
              <i class="fas fa-user"></i>
              关于我
            </router-link>
          </div>
        </div>
      </div>
      
      <div class="error-illustration">
        <div class="floating-elements">
          <div class="element element-1">🚀</div>
          <div class="element element-2">💻</div>
          <div class="element element-3">📚</div>
          <div class="element element-4">🎯</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

const goBack = () => {
  if (window.history.length > 1) {
    router.go(-1)
  } else {
    router.push('/')
  }
}
</script>

<style scoped>
.not-found {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  padding: 2rem;
}

.error-container {
  max-width: 1000px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  align-items: center;
  background: white;
  border-radius: 20px;
  padding: 4rem;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.error-content {
  text-align: left;
}

.error-number {
  font-size: 8rem;
  font-weight: 900;
  color: #ff6b6b;
  line-height: 1;
  margin-bottom: 1rem;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.error-content h1 {
  font-size: 2.5rem;
  color: #2c3e50;
  margin-bottom: 1rem;
  font-weight: 700;
}

.error-content p {
  font-size: 1.2rem;
  color: #7f8c8d;
  margin-bottom: 2rem;
  line-height: 1.6;
}

.error-actions {
  display: flex;
  gap: 1rem;
  margin-bottom: 3rem;
}

.btn-primary, .btn-secondary {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.8rem 1.5rem;
  border-radius: 25px;
  font-size: 1rem;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
}

.btn-primary {
  background: #ff6b6b;
  color: white;
}

.btn-primary:hover {
  background: #e05555;
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
}

.btn-secondary {
  background: transparent;
  color: #2c3e50;
  border: 2px solid #ddd;
}

.btn-secondary:hover {
  border-color: #ff6b6b;
  color: #ff6b6b;
  transform: translateY(-2px);
}

.suggestions h3 {
  color: #2c3e50;
  font-size: 1.2rem;
  margin-bottom: 1rem;
  font-weight: 600;
}

.suggestion-links {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}

.suggestion-link {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.6rem 1rem;
  background: #f8f9fa;
  color: #6c757d;
  text-decoration: none;
  border-radius: 15px;
  font-size: 0.9rem;
  transition: all 0.3s ease;
}

.suggestion-link:hover {
  background: #ff6b6b;
  color: white;
  transform: translateY(-2px);
}

.error-illustration {
  position: relative;
  height: 400px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.floating-elements {
  position: relative;
  width: 300px;
  height: 300px;
}

.element {
  position: absolute;
  font-size: 3rem;
  animation: float 3s ease-in-out infinite;
  opacity: 0.8;
}

.element-1 {
  top: 20%;
  left: 20%;
  animation-delay: 0s;
}

.element-2 {
  top: 60%;
  right: 20%;
  animation-delay: 0.5s;
}

.element-3 {
  bottom: 20%;
  left: 30%;
  animation-delay: 1s;
}

.element-4 {
  top: 40%;
  right: 40%;
  animation-delay: 1.5s;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0px) rotate(0deg);
  }
  50% {
    transform: translateY(-20px) rotate(5deg);
  }
}

/* 响应式设计 */
@media (max-width: 768px) {
  .error-container {
    grid-template-columns: 1fr;
    gap: 2rem;
    padding: 2rem;
  }
  
  .error-number {
    font-size: 6rem;
  }
  
  .error-content h1 {
    font-size: 2rem;
  }
  
  .error-actions {
    flex-direction: column;
  }
  
  .suggestion-links {
    justify-content: center;
  }
  
  .error-illustration {
    height: 250px;
  }
  
  .floating-elements {
    width: 200px;
    height: 200px;
  }
  
  .element {
    font-size: 2rem;
  }
}

@media (max-width: 480px) {
  .not-found {
    padding: 1rem;
  }
  
  .error-container {
    padding: 1.5rem;
  }
  
  .error-number {
    font-size: 4rem;
  }
  
  .error-content h1 {
    font-size: 1.5rem;
  }
  
  .error-content p {
    font-size: 1rem;
  }
}
</style>
