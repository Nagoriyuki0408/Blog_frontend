<template>
  <header class="header">
    <div class="header-container">
      <div class="logo">
        <router-link to="/">
          <h1>My Blog</h1>
        </router-link>
      </div>
      
      <nav class="nav" :class="{ 'nav-open': isMenuOpen }">
        <router-link 
          v-for="item in navItems" 
          :key="item.path"
          :to="item.path"
          class="nav-link"
          @click="closeMenu"
        >
          {{ item.name }}
        </router-link>
      </nav>
      
      <div class="mobile-menu-toggle" @click="toggleMenu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref } from 'vue'

const isMenuOpen = ref(false)

const navItems = [
  { name: '首页', path: '/' },
  { name: '技术', path: '/tech' },
  { name: '生活', path: '/life' },
  { name: '关于我', path: '/about' }
]

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value
}

const closeMenu = () => {
  isMenuOpen.value = false
}
</script>

<style scoped>
.header {
  background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
  color: white;
  padding: 1rem 0;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
}

.header-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.logo h1 {
  margin: 0;
  font-weight: 700;
  font-size: 1.8rem;
  color: white;
  text-decoration: none;
}

.logo a {
  text-decoration: none;
  color: inherit;
}

.nav {
  display: flex;
  gap: 2rem;
  align-items: center;
}

.nav-link {
  color: white;
  text-decoration: none;
  font-weight: 600;
  font-size: 1rem;
  padding: 0.5rem 1rem;
  border-radius: 6px;
  transition: all 0.3s ease;
  position: relative;
}

.nav-link:hover {
  background: rgba(255, 255, 255, 0.1);
  transform: translateY(-2px);
}

.nav-link.router-link-active {
  background: rgba(255, 255, 255, 0.2);
}

.mobile-menu-toggle {
  display: none;
  flex-direction: column;
  cursor: pointer;
  gap: 4px;
}

.mobile-menu-toggle span {
  width: 25px;
  height: 3px;
  background: white;
  border-radius: 2px;
  transition: all 0.3s ease;
}

/* 响应式设计 */
@media (max-width: 768px) {
  .header-container {
    padding: 0 1rem;
  }
  
  .nav {
    position: fixed;
    top: 100%;
    left: 0;
    right: 0;
    background: #ff6b6b;
    flex-direction: column;
    padding: 2rem;
    gap: 1rem;
    transform: translateY(-100%);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }
  
  .nav.nav-open {
    transform: translateY(0);
    opacity: 1;
    visibility: visible;
  }
  
  .nav-link {
    width: 100%;
    text-align: center;
    padding: 1rem;
    border-radius: 8px;
  }
  
  .mobile-menu-toggle {
    display: flex;
  }
  
  .mobile-menu-toggle.nav-open span:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
  }
  
  .mobile-menu-toggle.nav-open span:nth-child(2) {
    opacity: 0;
  }
  
  .mobile-menu-toggle.nav-open span:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -6px);
  }
}
</style>
