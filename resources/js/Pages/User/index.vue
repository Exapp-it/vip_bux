<script setup>
import { ref } from "vue";

const message = ref("Привет, мир!");
const description = ref("Это пример Vue-компонента.");

</script>

<template>
    <div>
        <h1>{{ message }}</h1>
        <p>{{ description }}</p>
    </div>
</template>
