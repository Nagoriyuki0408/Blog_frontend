# My Blog - 现代化博客平台

## 项目结构重构说明

### 重构目标
- 分离前后端架构
- 优化资源管理
- 提升开发体验
- 现代化技术栈

### 新的项目结构

```
frontend/
├── public/                 # 静态资源
│   ├── favicon.ico
│   ├── images/            # 图片资源
│   └── fonts/             # 字体文件
├── src/                   # Vue.js 源代码
│   ├── components/        # Vue 组件
│   ├── views/            # 页面视图
│   ├── router/           # 路由配置
│   ├── services/         # API 服务
│   ├── stores/           # 状态管理
│   ├── utils/            # 工具函数
│   ├── styles/           # 样式文件
│   └── assets/           # 项目资源
├── backend/              # 后端API (可选)
├── docs/                 # 文档
├── package.json
├── vite.config.js
└── README.md
```

### 技术栈
- **前端**: Vue 3 + Vite + Vue Router
- **样式**: CSS3 + 响应式设计
- **构建工具**: Vite
- **包管理**: npm

### 开发命令
```bash
# 安装依赖
npm install

# 开发模式
npm run dev

# 构建生产版本
npm run build

# 预览构建结果
npm run preview
```

### 迁移说明
1. 原有的静态HTML内容已迁移到Vue组件中
2. 第三方库通过CDN或npm包管理
3. 图片和字体资源统一放在public目录
4. 样式文件模块化管理

### 下一步计划
- [ ] 添加状态管理 (Pinia)
- [ ] 集成UI组件库
- [ ] 添加单元测试
- [ ] 配置CI/CD
- [ ] 优化SEO