<template>
    <div>
        <Navbar />
        <router-view />
    </div>
</template>

<script setup>
import Navbar from "./components/Navbar.vue";
</script>

<style>
body {
    font-family: "Helvetica Neue", Arial, sans-serif;
    background: #f9f9f9;
    margin: 0;
}
</style>
