<script setup>
import { useForm } from "@inertiajs/vue3";
import MainLogo from "./MainLogo.vue";
import MainButton from "../Components/UI/MainButton.vue";


const form = useForm({
    login: null,
    password: null,
    remember: false,
});

const store = () => {
    form.post(route("login.store"));
};
</script>

<template>
    <div class="flex justify-center mb-8">
        <MainLogo />
    </div>
    <h1 class="text-2xl font-semibold text-center text-gray-600 mt-8 mb-6">
        Вход
    </h1>
    <form @submit.prevent="store">
        <div class="mb-6">
            <label
                for="login"
                class="block mb-2 text-sm font-semibold text-gray-600"
            >
                Логин
            </label>
            <div
                :class="{ 'border-2 border-red-500': form.errors.login }"
                class="flex rounded-full bg-stone-900 px-2 py-4 w-full max-w-[600px] transition duration-300"
            >
                <input
                    v-model="form.login"
                    id="login"
                    type="text"
                    class="w-full bg-stone-900 flex bg-transparent pl-2 text-[#cccccc] outline-0"
                    placeholder="Введите ваш логин"
                    autofocus
                />
            </div>
            <div class="text-red-500 mt-2" v-if="form.errors.login">
                {{ form.errors.login }}
            </div>
        </div>

        <div class="mb-6">
            <label
                for="password"
                class="block mb-2 text-sm font-semibold text-gray-600"
            >
                Пароль
            </label>
            <div
                :class="{ 'border-2 border-red-500': form.errors.password }"
                class="flex rounded-full bg-stone-900 px-2 py-4 w-full max-w-[600px] transition duration-300"
            >
                <input
                    v-model="form.password"
                    id="password"
                    type="password"
                    class="w-full bg-stone-900 flex bg-transparent pl-2 text-[#cccccc] outline-0"
                    placeholder="************"
                    autofocus
                />
            </div>
            <div class="text-red-500 mt-2" v-if="form.errors.password">
                {{ form.errors.password }}
            </div>
        </div>

        <div class="inline-flex items-center mb-3">
            <label
                class="relative flex cursor-pointer items-center rounded-full p-3"
                for="remember"
                data-ripple-dark="true"
            >
                <input
                    v-model="form.remember"
                    type="checkbox"
                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border-2 border-green-500 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-green-500 checked:bg-green-500 checked:before:bg-green-500 hover:before:opacity-10"
                    id="remember"
                />
                <div
                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        stroke="currentColor"
                        stroke-width="1"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </div>
                <span class="absolute ml-8 text-nowrap text-gray-600"
                    >Запомнить меня</span
                >
            </label>
        </div>
        <MainButton :proccesing="form.processing"> Войти </MainButton>
    </form>
</template>
