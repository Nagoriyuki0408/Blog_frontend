<template>
  <div id="app">
    <Header />
    <main class="main-content">
      <router-view />
    </main>
    <Footer />
  </div>
</template>

<script setup>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
</script>

<style>
/* 全局样式重置 */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  background: #fafafa;
  color: #333;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

#app {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

.main-content {
  flex: 1;
  padding-top: 1rem;
}

/* 全局链接样式 */
a {
  color: #ff6b6b;
  text-decoration: none;
  transition: color 0.3s ease;
}

a:hover {
  color: #e05555;
}

/* 全局按钮样式 */
button {
  cursor: pointer;
  border: none;
  outline: none;
  font-family: inherit;
}

/* 全局输入框样式 */
input, textarea {
  font-family: inherit;
  outline: none;
}

/* 滚动条样式 */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: #ff6b6b;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: #e05555;
}

/* 响应式字体大小 */
html {
  font-size: 16px;
}

@media (max-width: 768px) {
  html {
    font-size: 14px;
  }
}
</style>
