<script setup>
import { useForm } from "@inertiajs/vue3";
import MainLogo from "../Components/MainLogo.vue";
import MainButton from "../Components/UI/MainButton.vue";

const form = useForm({
    email: null,
    login: null,
    password: null,
    password_confirmation: null,
});

const store = () => {
    form.post(route("register.store"));
};
</script>

<template>
    <div class="flex justify-center mb-8">
        <MainLogo />
    </div>
    <h1 class="text-2xl font-semibold text-center text-gray-600 mt-8 mb-6">
        Регистрация
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
                for="email"
                class="block mb-2 text-sm font-semibold text-gray-600"
            >
                Email
            </label>
            <div
                :class="{ 'border-2 border-red-500': form.errors.email }"
                class="flex rounded-full bg-stone-900 px-2 py-4 w-full max-w-[600px]"
            >
                <input
                    v-model="form.email"
                    id="email"
                    type="email"
                    class="w-full bg-stone-900 flex bg-transparent pl-2 text-[#cccccc] outline-0"
                    placeholder="Введите ваш Email"
                    autofocus
                />
            </div>
            <div class="text-red-500 mt-2" v-if="form.errors.email">
                {{ form.errors.email }}
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
                class="flex rounded-full bg-stone-900 px-2 py-4 w-full max-w-[600px]"
            >
                <input
                    v-model="form.password"
                    id="password"
                    type="password"
                    class="w-full bg-stone-900 flex bg-transparent pl-2 text-[#cccccc] outline-0"
                    placeholder="***********"
                    autofocus
                />
            </div>
            <div class="text-red-500 mt-2" v-if="form.errors.password">
                {{ form.errors.password }}
            </div>
        </div>

        <div class="mb-6">
            <label
                for="password_confirmation"
                class="block mb-2 text-sm font-semibold text-gray-600"
            >
                Повторите
            </label>
            <div
                :class="{
                    'border-2 border-red-500':
                        form.errors.password_confirmation,
                }"
                class="flex rounded-full bg-stone-900 px-2 py-4 w-full max-w-[600px]"
            >
                <input
                    v-model="form.password_confirmation"
                    id="password_confirmation"
                    type="password"
                    class="w-full bg-stone-900 flex bg-transparent pl-2 text-[#cccccc] outline-0"
                    placeholder="***********"
                    autofocus
                />
            </div>
            <div
                class="text-red-500 mt-2"
                v-if="form.errors.password_confirmation"
            >
                {{ form.errors.password_confirmation }}
            </div>
        </div>

        <MainButton :proccesing="form.processing">
            Зарегистрироваться
        </MainButton>
    </form>
</template>
