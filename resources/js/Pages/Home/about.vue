<script setup>
import { ref } from "vue";
import AppLayout from "../../Layouts/AppLayout.vue";

defineProps({
    title: String,
});

const message = ref("Привет, мир!");
const description = ref("Это пример Vue-компонента.");
</script>

<template>
    <AppLayout>
        <Head :title="title" />
        <div class="main-container py-10 text-white">
            <h1>{{ message }}</h1>
            <p>{{ description }}</p>
        </div>
    </AppLayout>
</template>
