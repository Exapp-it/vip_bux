<script setup>
import { usePage } from "@inertiajs/vue3";
import MainLogo from "./MainLogo.vue";

const page = usePage();
const user = page.props.user.data;
defineProps({
    openModal: Function,
});
</script>

<template>
    <header class="gradient-gold">
        <div class="main-container">
            <div class="flex items-center justify-between h-20">
                <MainLogo />
                <div class="flex items-center space-x-4">
                    <nav class="sm:hidden">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <span
                                    v-if="user === null"
                                    @click="openModal('register')"
                                    class="border border-gray-800 px-2 py-2 hover:shadow-2xl text-gray-800 cursor-pointer transition hover:text-white"
                                >
                                    Регистрация
                                </span>
                                <Link
                                    v-if="user"
                                    class="border border-gray-800 px-2 py-2 hover:shadow-2xl text-gray-800 cursor-pointer transition hover:text-white"
                                    :href="route('user.index')"
                                >
                                    В аккаунт
                                </Link>
                            </li>

                            <li>
                                <Link
                                    class="text-gray-800 transition hover:text-white"
                                    :href="route('home.about')"
                                >
                                    Услуги
                                </Link>
                            </li>

                            <li>
                                <a
                                    class="text-gray-800 transition hover:text-white"
                                    href="/"
                                >
                                    Новости
                                </a>
                            </li>

                            <li>
                                <a
                                    class="text-gray-800 transition hover:text-white"
                                    href="/"
                                >
                                    Правила
                                </a>
                            </li>

                            <li>
                                <a
                                    class="text-gray-800 transition hover:text-white"
                                    href="/"
                                >
                                    Общение
                                </a>
                            </li>

                            <li>
                                <a
                                    class="text-gray-800 transition hover:text-white"
                                    href="/"
                                >
                                    Контакты
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="flex items-center gap-4 pl-5">
                        <div class="flex gap-4">
                            <span
                                v-if="user === null"
                                @click="openModal('login')"
                                class="block rounded-md px-5 py-2.5 text-sm font-medium cursor-pointer text-gray-700 transition"
                            >
                                Login
                            </span>
                            <div
                                class="flex items-center"
                                v-if="user"
                            >
                                <Link
                                    class="text-gray-800 transition hover:text-white"
                                    :href="route('user.index')"
                                >
                                <img
                                    class="relative mr-4 inline-block h-6 w-6 rounded-md object-cover object-center"
                                    alt="Image placeholder"
                                    src="https://i.pravatar.cc/150?img=3"
                                />
                                    {{ user.login }}
                                </Link>
                            </div>
                        </div>

                        <button
                            class="rounded bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 sm:block hidden"
                        >
                            <span class="sr-only">Toggle menu</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
