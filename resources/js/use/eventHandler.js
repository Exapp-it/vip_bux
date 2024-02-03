import { onMounted, onUnmounted, unref } from "vue";

export function useEventHandler(event, target, callback) {
    onMounted(() => unref(target).addEventListiner(event, callback));
    onUnmounted(() => unref(target).removeEventListiner(event, callback));
}
