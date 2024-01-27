<script setup>
const { modalType, showModal } = defineProps(["modalType", "showModal"]);
const  emit  = defineEmits();

const closeModal = () => {
    emit("close");
};
</script>

<template>
    <transition name="fade">
        <div
            v-if="showModal"
            @click.away="closeModal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75"
        >
            <div
                class="gradient-gold w-1/3 border-red-500 p-8 rounded shadow-2xl"
                @click.stop
            >
                <slot />
            </div>
        </div>
    </transition>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: all 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
