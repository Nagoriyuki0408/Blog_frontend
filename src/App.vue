<template>
  <div id="app">
    <h1>欢迎来到我的博客</h1>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style scoped>
h1 {
  text-align: center;
  margin-top: 20px;
}
</style>
