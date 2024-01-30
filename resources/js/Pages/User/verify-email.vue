<script setup>
import { router } from "@inertiajs/vue3";
import UserLayout from "../../Layouts/UserLayout.vue";

defineProps({
    title: String,
});

const send = () => {
    router.post(route("verification.send"));
};
</script>

<template>
    <Head :title="title" />
    <UserLayout>
        <div class="mt-8 flex flex-wrap space-y-2 space-x-4">
            <div
                class="flex-1 bg-stone-900 p-4 shadow-lg border border-red-600 rounded-lg w-1/2"
            >
                <h2 class="text-gold-1 text-lg font-semibold pb-1">
                    Необходимо подтвердить почту.
                </h2>
                <button @click="send">Отправить Повторно</button>
                <div class="my-1"></div>
                <div class="gradient-gold h-px mb-6"></div>
            </div>
        </div>
    </UserLayout>
</template>
