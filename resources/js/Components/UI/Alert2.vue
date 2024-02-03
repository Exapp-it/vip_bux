<script setup>
defineProps(["show", "status", "message"]);
</script>

<template>
    <div
        v-if="show"
        :class="{
            'border-red-600': status === 'error',
            'border-green-600': status === 'success',
        }"
        class="flex flex-col justify-center p-4 bg-stone-900 border shadow-md hover:shodow-lg rounded-2xl"
    >
        <span
        :class="{
            'text-red-600': status === 'error',
            'text-green-600': status === 'success',
        }"
        class="text-xl font-semibold text-center">
            {{ message }}
        </span>
    </div>
</template>
