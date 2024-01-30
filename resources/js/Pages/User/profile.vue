<script setup>
import UserLayout from "../../Layouts/UserLayout.vue";

defineProps({
    title: String,
});


</script>



<template>
    <Head :title="title" />
    <UserLayout>
        <div class="mt-8 flex flex-wrap space-y-2 space-x-4"></div>
    </UserLayout>
</template>
