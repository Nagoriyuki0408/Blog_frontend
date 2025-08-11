import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import About from '../views/About.vue'
import Post from '../views/Post.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      title: '首页 - My Blog'
    }
  },
  {
    path: '/tech',
    name: 'Tech',
    component: () => import('../views/Tech.vue'),
    meta: {
      title: '技术文章 - My Blog'
    }
  },
  {
    path: '/life',
    name: 'Life',
    component: () => import('../views/Life.vue'),
    meta: {
      title: '生活随笔 - My Blog'
    }
  },
  {
    path: '/about',
    name: 'About',
    component: About,
    meta: {
      title: '关于我 - My Blog'
    }
  },
  {
    path: '/post/:id',
    name: 'Post',
    component: Post,
    meta: {
      title: '文章详情 - My Blog'
    }
  },
  {
    path: '/tag/:id',
    name: 'Tag',
    component: () => import('../views/Tag.vue'),
    meta: {
      title: '标签 - My Blog'
    }
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'NotFound',
    component: () => import('../views/NotFound.vue'),
    meta: {
      title: '页面未找到 - My Blog'
    }
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { top: 0 }
    }
  }
})

// 路由守卫 - 更新页面标题
router.beforeEach((to, from, next) => {
  if (to.meta.title) {
    document.title = to.meta.title
  }
  next()
})

export default router
