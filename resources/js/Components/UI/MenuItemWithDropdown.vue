<script setup>
import MenuItem from "./MenuItem.vue";
import { ref } from "vue";

const submenuVisible = ref({});
defineProps(["icon", "text", "menuItem", 'show']);

const toggleDropdown = (menuItem) => {
    submenuVisible.value[menuItem] = !submenuVisible.value[menuItem];
};
</script>

<template>
    <div>
        <div
            @click="toggleDropdown(menuItem)"
            class="p-2.5 mt-3 gradient-gold flex items-center rounded-md px-4 duration-500 cursor-pointer hover:scale-110 text-gray-900"
        >
            <i :class="icon"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-gray-900 font-bold">{{
                    text
                }}</span>
                <span class="text-sm rotate-180">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </div>
        </div>
        <div
            :class="{ hidden: !submenuVisible[menuItem] }"
            class="text-left text-sm mt-2 w-4/5 mx-auto text-gold-1 font-bold duration-300 transition"
        >
            <MenuItem icon="bi bi-person" text="Social" />
            <MenuItem icon="bi bi-person" text="Personal" />
            <MenuItem icon="bi bi-person" text="Friends" />
        </div>
    </div>
</template>
