<script setup>
defineProps({
    proccesing: Boolean,
});
</script>

<template>
    <button
        :disabled="proccesing"
        type="submit"
        class="block rounded mx-auto bg-red-600 px-12 py-3 text-sm font-medium text-white shadow transition duration-300 hover:bg-red-700 focus:outline-none focus:ring active:bg-red-500 md:w-auto"
    >
        <slot />
    </button>
</template>
