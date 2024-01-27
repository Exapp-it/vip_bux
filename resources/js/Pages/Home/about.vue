<script setup>
import { ref } from "vue";

defineProps({
  title: String
})

const message = ref("Привет, мир!");
const description = ref("Это пример Vue-компонента.");

</script>

<template>
    <Head :title="title" />
    <div class="main-container py-10 text-white">
        <h1>{{ message }}</h1>
        <p>{{ description }}</p>
    </div>
</template>
