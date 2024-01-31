<script setup>
import { ref, computed } from "vue";

const props = defineProps(["status", "iconClass"]);

const showTooltip = ref(false);

const statusText = computed(() => {
    return props.status ? "Подтвержден" : "Не подтвержден";
});
</script>

<template>
    <span class="relative inline-block">
        <i
            :class="{
                'text-green-500': status,
                'text-red-500': !status,
                [iconClass]: true,
            }"
            class="cursor-pointer"
            @mouseover="showTooltip = true"
            @mouseout="showTooltip = false"
        ></i>
        <div
            v-show="showTooltip"
            :class="{
                'bg-green-500': status,
                'bg-red-500': !status,
            }"
            class="text-white text-xs py-1 px-2 rounded shadow absolute bottom-full left-1/2 transform -translate-x-1/2"
        >
            {{ statusText }}
        </div>
    </span>
</template>
