<script setup>
import { useForm } from "@inertiajs/vue3";
import MainLogo from "./MainLogo.vue";
import MainButton from "../Components/UI/MainButton.vue";

const form = useForm({
    code: "",
});

const sendCode = () => {
    form.post(route("user.auth.verify"));
};
</script>

<template>
    <div class="flex justify-center mb-8">
        <MainLogo />
    </div>

    <h1 class="text-2xl font-semibold text-center text-gold-3 mt-8 mb-6">
        Подтверждения входа
    </h1>
    <form @submit.prevent="sendCode">
        <div class="flex items-center w-full mb-3">
            <div
                class="flex items-center bg-white w-full rounded-lg"
                :class="{
                    'border-2 border-red-500': form.errors.code,
                }"
            >
                <div>
                    <span
                        class="flex items-center gradient-gold min-w-28 h-12 rounded-l-lg px-3"
                    >
                        <span
                            class="text-sm text-gray-900 font-semibold text-nowrap"
                        >
                            Проверочный код
                        </span>
                    </span>
                </div>
                <div class="w-full">
                    <input
                        placeholder="Введите проверочный код"
                        v-model="form.code"
                        type="number"
                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                    />
                </div>
            </div>
          </div>
          <div class="text-red-500 mt-2 text-center mb-3" v-if="form.errors.code">
              {{ form.errors.code }}
          </div>
        <MainButton :proccesing="form.processing"> Подтвердить </MainButton>
    </form>
</template>
