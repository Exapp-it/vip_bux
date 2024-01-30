<script setup>
import { Link, router } from "@inertiajs/vue3";
import MainLogo from "./MainLogo.vue";
import { ref } from "vue";

const { user } = defineProps(["user"]);

console.log(user);

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
                <div class="flex items-center space-x-1">
                    <div class="flex items-center pl-5">
                        <Link
                            :href="route('user.index')"
                            class="flex group items-center space-x-4 border border-green-600 rounded-full px-2 py-2 hover:shadow-2xl transition duration-300"
                        >
                            <i
                                class="bi bi-wallet-fill  text-green-600 text-xl group-hover:rotate-180 transition duration-300"
                            ></i>
                            <span class="text-gray-700 font-semibold transition duration-300"
                                >{{ user.wallet.balance }}
                                <span class="text-green-600 font-extrabold">&#x20bd;</span>
                            </span>
                        </Link>
                    </div>
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
                                    class="flex group justify-center items-center space-x-3 cursor-pointer"
                                >
                                    <div
                                        class="w-12 h-12 rounded-full overflow-hidden border-2 border-gray-900 group-hover:scale-110 transition duration-300"
                                    >
                                        <img
                                            src="https://i.pravatar.cc/150?img=3"
                                            alt=""
                                            class="w-full h-full object-cover"
                                        />
                                    </div>
                                    <div
                                        class="font-semibold text-gray-900 text-lg group-hover:scale-90 transition duration-300"
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
                                            <Link
                                                :href="route('user.profile')"
                                                class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-stone-900 hover:text-gray-600"
                                            >
                                                <div class="mr-3">
                                                    <i
                                                        class="bi bi-person-bounding-box text-xl"
                                                    ></i>
                                                </div>
                                                Профиль
                                            </Link>
                                        </li>
                                        <li class="font-medium">
                                            <a
                                                href="#"
                                                class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-stone-900 hover:text-gray-600"
                                            >
                                                <div class="mr-3">
                                                    <i
                                                        class="bi bi-gear-wide text-xl"
                                                    ></i>
                                                </div>
                                                Настройки
                                            </a>
                                        </li>
                                        <hr class="border-red-600" />
                                        <li class="font-medium">
                                            <span
                                                @click="logout"
                                                class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600 hover:text-gray-600 cursor-pointer"
                                            >
                                                <div class="mr-3 text-red-600">
                                                    <i
                                                        class="bi bi-box-arrow-left text-red-600 text-xl"
                                                    ></i>
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
