<template>
    <nav>
        <router-link to="/">首页</router-link>
        <router-link to="/about">关于</router-link>
    </nav>
</template>

<script setup></script>

<style scoped>
nav {
    background: #333;
    color: #fff;
    padding: 1em;
}
a {
    color: #fff;
    margin-right: 1em;
    text-decoration: none;
}
a.router-link-active {
    font-weight: bold;
    text-decoration: underline;
}
</style>
