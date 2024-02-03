<script setup>
import AuthVerifyForm from "../../Components/AuthVerifyForm.vue";
import { ref } from "vue";
import UserLayout from "../../Layouts/UserLayout.vue";
import AppLayout from "../../Layouts/AppLayout.vue";

defineProps(["title"]);

const showModal = ref(false);

const close = () => {
    showModal.value = false;
};
</script>

<template>
    <Head :title="title" />
    <AppLayout>
        <div class="max-w-3xl w-full mx-auto grid gap-4 grid-cols-1 mt-10">
            <div
                class="flex flex-col bg-gold-2/20 border border-red-600 rounded-2xl p-4 shadow-2xl"
            >
                <AuthVerifyForm />
            </div>
        </div>
    </AppLayout>
</template>
