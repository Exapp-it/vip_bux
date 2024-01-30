<script setup>
defineProps(["icon", "text"]);
</script>

<template>
    <div
        class="p-2.5 mt-3 gradient-gold flex items-center rounded-md px-4 duration-500 cursor-pointer hover:scale-110 text-gray-900"
    >
        <i :class="icon"></i>
        <span class="text-[15px] ml-4 text-gray-900 font-bold">{{ text }}</span>
        <!-- <span class="rounded-full bg-green-600 px-2 ml-auto">1</span> -->
    </div>
</template>
