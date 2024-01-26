<script setup>
import { Head } from '@inertiajs/vue3'

defineProps({ title: String })
</script>

<template>
    <Head title="Welcome" />
    <h1>Welcome</h1>
    <p>Hello {{ title }}, welcome to your first Inertia app!</p>
</template>