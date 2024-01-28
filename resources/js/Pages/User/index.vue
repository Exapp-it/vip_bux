<script setup>
import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import UserLayout from "../../Layouts/UserLayout.vue";

const page = usePage();
</script>

<template>
    <UserLayout>
        <div class="mt-8 flex flex-wrap space-y-2 space-x-4">
            <div class="flex-1 bg-stone-900 p-4 shadow-lg border border-red-600 rounded-lg w-1/2">
                <h2 class="text-gold-1 text-lg font-semibold pb-1">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Atque magni vel sint, quia quaerat temporibus quisquam ea
                    consectetur sequi commodi dolorum mollitia? Quidem
                    distinctio incidunt eius harum cupiditate et ab?
                </h2>
                <div class="my-1"></div>
                <div
                    class="gradient-gold h-px mb-6"
                ></div>
            </div>
        </div>
    </UserLayout>
</template>
