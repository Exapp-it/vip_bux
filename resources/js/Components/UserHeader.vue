<script setup>
import { usePage, router } from "@inertiajs/vue3";
import MainLogo from "./MainLogo.vue";
import { ref } from "vue";

const page = usePage();
const user = page.props.user.data;

const userDropdown = ref(false);

let closeTimer;

const openUserDropdown = () => {
    clearTimeout(closeTimer);
    userDropdown.value = true;
};

const closeUserDropdown = () => {
    closeTimer = setTimeout(() => {
        userDropdown.value = false;
    }, 500);
};

const cancelCloseUserDropdown = () => {
    clearTimeout(closeTimer);
};

const logout = () => {
    router.delete(route("user.logout"));
};
</script>

<template>
    <header class="gradient-gold">
        <div class="main-container">
            <div class="flex items-center justify-between h-20">
                <MainLogo />
                <div class="flex items-center space-x-4">
                    <div class="flex items-center gap-4 pl-5">
                        <div class="flex justify-center items-center">
                            <div
                                class="relative border-b-4 border-transparent py-3"
                                :class="{
                                    'border-stone-900 transform transition duration-300 ':
                                        userDropdown,
                                }"
                            >
                                <div
                                    @mouseover="openUserDropdown"
                                    @mouseout="closeUserDropdown"
                                    class="flex justify-center items-center space-x-3 cursor-pointer"
                                >
                                    <div
                                        class="w-12 h-12 rounded-full overflow-hidden border-2 border-gray-900"
                                    >
                                        <img
                                            src="https://i.pravatar.cc/150?img=3"
                                            alt=""
                                            class="w-full h-full object-cover"
                                        />
                                    </div>
                                    <div
                                        class="font-semibold text-gray-900 text-lg"
                                    >
                                        <div class="cursor-pointer">
                                            {{ user.login }}
                                        </div>
                                    </div>
                                </div>
                                <div
                                    @mouseover="cancelCloseUserDropdown"
                                    @mouseout="closeUserDropdown"
                                    v-if="userDropdown"
                                    class="absolute w-60 px-5 py-3 -right-20 gradient-gold rounded-lg shadow border mt-5 transition duration-300"
                                >
                                    <ul class="space-y-3">
                                        <li class="font-medium">
                                            <a
                                                href="#"
                                                class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-stone-900"
                                            >
                                                <div class="mr-3">
                                                    <svg
                                                        class="w-6 h-6"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                Account
                                            </a>
                                        </li>
                                        <li class="font-medium">
                                            <a
                                                href="#"
                                                class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-stone-900"
                                            >
                                                <div class="mr-3">
                                                    <svg
                                                        class="w-6 h-6"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                                        ></path>
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                Setting
                                            </a>
                                        </li>
                                        <hr class="border-red-600" />
                                        <li class="font-medium">
                                            <span
                                                @click="logout"
                                                class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600 cursor-pointer"
                                            >
                                                <div class="mr-3 text-red-600">
                                                    <svg
                                                        class="w-6 h-6"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                Выйти
                                            </span>
                                        </li>
                                    </ul>
                                </div>
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
