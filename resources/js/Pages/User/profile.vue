<script setup>
import { usePage } from "@inertiajs/vue3";
import UserLayout from "../../Layouts/UserLayout.vue";
import IconStar from "../../Components/UI/Icons/IconStar.vue";
import TooltipWithStatus from "../../Components/UI/TooltipWithStatus.vue";
import Alert2 from "../../Components/UI/Alert2.vue";

defineProps(["title"]);

const page = usePage();
const user = page.props.user.data;
</script>

<template>
    <Head :title="title" />
    <UserLayout>
        <div class="max-w-3xl w-full mx-auto grid gap-4 grid-cols-1">
            <Alert2
                :show="!user.profile.email_verified"
                :message="'Подтвердите свою почту'"
                :status="'error'"
            />
            <div class="flex flex-col">
                <div
                    class="bg-stone-900 border border-red-600 shadow-lg rounded-2xl p-4"
                >
                    <div class="flex-none sm:flex">
                        <div class="relative h-32 w-32 sm:mb-0 mx-auto mb-3">
                            <img
                                src="https://i.pravatar.cc/150?img=3"
                                alt="aji"
                                class="w-32 h-32 object-cover rounded-2xl"
                            />
                            <label
                                class="absolute -right-2 bottom-2 -ml-3 cursor-pointer text-gold-1 p-1 text-xs bg-green-400 hover:bg-green-500 font-medium tracking-wider rounded-full transition ease-in duration-300"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    class="h-4 w-4"
                                >
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                    ></path>
                                </svg>
                                <input type="file" class="hidden" />
                            </label>
                        </div>
                        <div class="flex-auto sm:ml-5 justify-evenly">
                            <div
                                class="flex items-center justify-between sm:mt-2"
                            >
                                <div class="flex items-center">
                                    <div class="flex flex-col">
                                        <div
                                            class="w-full flex-none text-lg text-gold-1 font-bold leading-none"
                                        >
                                            {{ user.login }}
                                            <span
                                                class="relative inline-flex rounded-md shadow-sm ml-2"
                                            >
                                                <span
                                                    class="flex absolute h-2 w-2 top-0 right-0 -mt-2.5 -mr-1"
                                                >
                                                    <span
                                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"
                                                    ></span>
                                                    <span
                                                        class="relative inline-flex rounded-full h-2 w-2 bg-green-500"
                                                    ></span>
                                                </span>
                                            </span>
                                        </div>
                                        <div
                                            class="flex-auto text-gray-400 my-1"
                                        >
                                            <span class="mr-3">
                                                {{ user.status }}
                                            </span>
                                            <span
                                                class="mr-3 border-r border-gray-600 max-h-0"
                                            >
                                            </span>
                                            <span class="text-green-500"
                                                >{{ user.points }}
                                                <small>Оч.</small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="gradient-gold rounded-full p-2 cursor-pointer transition duration-500 hover:scale-110 focus:outline-none focus:ring focus:ring-gold-2 text-green-500"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="2"
                                        stroke="currentColor"
                                        class="w-14 h-14"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex flex-row items-center">
                                <div class="flex">
                                    <IconStar :color="'text-yellow-400'" />
                                </div>
                                <div
                                    class="flex-1 inline-flex items-center ml-2 space-x-2"
                                >
                                    <TooltipWithStatus
                                        :status="user.profile.email_verified"
                                        iconClass="bi bi-envelope-check-fill"
                                    />
                                    <TooltipWithStatus
                                        :status="user.profile.phone_verified"
                                        iconClass="bi bi-telephone-fill"
                                    />
                                    <TooltipWithStatus
                                        :status="user.profile.telegram_verified"
                                        iconClass="bi bi-telegram"
                                    />
                                </div>
                            </div>
                            <div class="flex pt-2 text-sm text-gray-400">
                                <div class="flex-1 inline-flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 mr-2"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"
                                        ></path>
                                    </svg>
                                    <p class="">
                                        Регистрация: {{ user.created_at }}
                                    </p>
                                </div>
                                <div class="flex-1 inline-flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 mr-2"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                            clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                    <p class="">14 Components</p>
                                </div>
                                <Link
                                    :href="route('user.profile.edit')"
                                    class="inline-block rounded gradient-gold px-6 py-2 text-sm font-medium text-gray-800 transition duration-500 hover:scale-110 focus:outline-none focus:ring focus:ring-gold-2"
                                >
                                    Редактировать
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---stats-->
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 sm:col-span-4">
                    <div
                        class="p-4 relative bg-stone-900 border border-red-600 shadow-lg rounded-2xl"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-14 w-14 absolute bottom-4 right-3 text-green-400"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5"
                            />
                        </svg>

                        <div class="flex justify-between items-center">
                            <span
                                class="text-2xl text-gray-100 font-medium leading-8"
                            >
                                {{ user.profile.country }}
                            </span>
                        </div>
                        <div
                            class="text-lg text-gray-100 font-medium leading-8 mt-5"
                        >
                            {{ user.profile.city }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ user.profile.region }}
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-4">
                    <div
                        class="p-4 relative bg-stone-900 border border-red-600 shadow-lg rounded-2xl"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-14 w-14 absolute bottom-4 right-3 text-blue-500"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"
                            />
                        </svg>
                        <div class="flex justify-between items-center">
                            <i class="fab fa-behance text-xl text-gray-400"></i>
                        </div>
                        <div
                            class="text-2xl text-gray-100 font-medium leading-8 mt-5"
                        >
                            99
                        </div>
                        <div class="text-sm text-gray-500">Projects</div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-4">
                    <div
                        class="p-4 relative bg-stone-900 border border-red-600 shadow-lg rounded-2xl"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-14 w-14 absolute bottom-4 right-3 text-yellow-300"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <div class="flex justify-between items-center">
                            <i class="fab fa-codepen text-xl text-gray-400"></i>
                        </div>
                        <div
                            class="text-2xl text-gray-100 font-medium leading-8 mt-5"
                        >
                            50
                        </div>
                        <div class="text-sm text-gray-500">Pen Items</div>
                    </div>
                </div>
            </div>
            <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
                <!--confirm modal-->
                <div
                    class="flex flex-col p-4 relative items-center justify-center bg-stone-900 border border-red-600 shadow-lg rounded-2xl"
                >
                    <div class="">
                        <div class="text-center p-5 flex-auto justify-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 -m-1 flex items-center text-blue-400 mx-auto"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-16 h-16 flex items-center text-gray-600 mx-auto"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <h2 class="text-xl font-bold py-4 text-gold-1">
                                Are you sure?
                            </h2>
                            <p class="text-sm text-gray-500 px-8">
                                Do you really want to delete your account? This
                                process cannot be undone
                            </p>
                        </div>
                        <div class="p-3 mt-2 text-center space-x-4 md:block">
                            <button
                                class="mb-2 md:mb-0 bg-gray-700 px-5 py-2 text-sm shadow-sm font-medium tracking-wider border-2 border-gray-600 hover:border-gray-700 text-gray-300 rounded-full hover:shadow-lg hover:bg-stone-900 transition ease-in duration-300"
                            >
                                Cancel
                            </button>
                            <button
                                class="bg-green-400 hover:bg-green-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-gold-1 rounded-full transition ease-in duration-300"
                            >
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
                <!--elements-->
                <div class="flex flex-col space-y-4">
                    <!-- elements 1 -->
                    <div
                        class="flex flex-col p-4 bg-stone-900 border-red-600 shadow-md hover:shodow-lg rounded-2xl cursor-pointer transition ease-in duration-500 transform hover:scale-105"
                    >
                        <div class="flex items-center justify-between">
                            <div class="flex items-center mr-auto">
                                <div class="inline-flex w-12 h-12">
                                    <img
                                        src="https://tailwindcomponents.com/storage/avatars/njkIbPhyZCftc4g9XbMWwVsa7aGVPajYLRXhEeoo.jpg"
                                        alt="aji"
                                        class="relative w-12 h-12 object-cover rounded-2xl"
                                    /><span
                                        class="animate-ping absolute w-12 h-12 inline-flex border-2 rounded-2xl border-green-400 opacity-75"
                                    ></span>
                                    <span></span>
                                </div>

                                <div class="flex flex-col ml-3">
                                    <div
                                        class="font-medium leading-none text-gray-100"
                                    >
                                        Aji
                                    </div>
                                    <p
                                        class="text-sm text-gray-500 leading-none mt-1"
                                    >
                                        UI/UX Designer
                                    </p>
                                </div>
                            </div>
                            <a
                                href="#"
                                class="flex-no-shrink text-xs font-medium tracking-wider text-gray-400 hover:text-green-400 transition ease-in duration-300 mr-2"
                                ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z"
                                        clip-rule="evenodd"
                                    ></path></svg
                            ></a>
                            <a
                                hrf="#"
                                class="flex-no-shrink text-xs font-medium tracking-wider text-gray-400 hover:text-green-400 transition ease-in duration-300 ml-2"
                                ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z"
                                        clip-rule="evenodd"
                                    ></path></svg
                            ></a>
                        </div>
                    </div>
                    <!--elements 2-->
                    <div
                        class="flex flex-col p-4 bg-stone-900 border-red-600 shadow-md hover:shodow-lg rounded-2xl cursor-pointer transition ease-in duration-500 transform hover:scale-105"
                    >
                        <div class="flex items-center justify-between">
                            <div class="flex items-center mr-auto">
                                <div class="inline-flex w-12 h-12">
                                    <img
                                        src="https://tailwindcomponents.com/storage/avatars/njkIbPhyZCftc4g9XbMWwVsa7aGVPajYLRXhEeoo.jpg"
                                        alt="aji"
                                        class="relative p-1 w-12 h-12 object-cover rounded-2xl"
                                    /><span
                                        class="absolute w-12 h-12 inline-flex border-2 rounded-2xl border-green-400 opacity-75"
                                    ></span>
                                    <span></span>
                                </div>

                                <div class="flex flex-col ml-3 min-w-0">
                                    <div
                                        class="font-medium leading-none text-gray-100"
                                    >
                                        Groupname
                                    </div>
                                    <p
                                        class="text-sm text-gray-500 leading-none mt-1 truncate"
                                    >
                                        Beautiful hand-crafted SVG icons
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col ml-3 min-w-0">
                                <span
                                    class="text-xs text-gray-500 text-right mb-1"
                                    >9:02pm</span
                                >
                                <div class="flex">
                                    <a
                                        class="flex-no-shrink text-xs font-medium tracking-wider text-gray-400 hover:text-green-400 transition ease-in duration-300 mr-2"
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM12.293 7.293a1 1 0 011.414 0L15 8.586l1.293-1.293a1 1 0 111.414 1.414L16.414 10l1.293 1.293a1 1 0 01-1.414 1.414L15 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L13.586 10l-1.293-1.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            /></svg
                                    ></a>
                                    <span
                                        class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-green-100 bg-green-400 rounded-full ml-2"
                                        >99</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--elements 2-->
                    <div
                        class="flex flex-col p-4 bg-stone-900 border-red-600 shadow-md hover:shodow-lg rounded-2xl cursor-pointer transition ease-in duration-500 transform hover:scale-105"
                    >
                        <div class="flex items-center justify-between">
                            <div class="flex items-center mr-auto">
                                <div class="inline-flex w-12 h-12">
                                    <img
                                        src="https://tailwindcomponents.com/storage/avatars/njkIbPhyZCftc4g9XbMWwVsa7aGVPajYLRXhEeoo.jpg"
                                        alt="aji"
                                        class="relative p-1 w-12 h-12 object-cover rounded-2xl"
                                    /><span
                                        class="absolute w-12 h-12 inline-flex border-2 rounded-2xl border-gray-600 opacity-75"
                                    ></span>
                                    <span></span>
                                </div>

                                <div class="flex flex-col ml-3 min-w-0">
                                    <div
                                        class="font-medium leading-none text-gray-100"
                                    >
                                        Ajimon
                                    </div>
                                    <p
                                        class="text-sm text-gray-500 leading-none mt-1 truncate"
                                    >
                                        Jul 066, 2021, 8.25 PM
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col ml-3 min-w-0">
                                <div class="flex">
                                    <h5
                                        class="flex items-center font-medium text-gray-300 mr-2"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                        1800
                                    </h5>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-green-400 ml-2"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col p-4 bg-stone-900 border border-red-600 shadow-md hover:text-green-500 text-gray-400 hover:shodow-lg rounded-2xl transition ease-in duration-500 transform hover:scale-105 cursor-pointer"
                    >
                        <div class="flex items-center justify-between">
                            <div class="flex items-center mr-auto">
                                <div class="-space-x-5 flex">
                                    <img
                                        src="https://tailwindcomponents.com/storage/avatars/njkIbPhyZCftc4g9XbMWwVsa7aGVPajYLRXhEeoo.jpg"
                                        alt="aji"
                                        class="relative p-1 w-12 h-12 object-cover rounded-2xl border-2 border-gray-600 bg-stone-900"
                                    />
                                    <img
                                        src="https://tailwindcomponents.com/storage/avatars/njkIbPhyZCftc4g9XbMWwVsa7aGVPajYLRXhEeoo.jpg"
                                        alt="aji"
                                        class="relative p-1 w-12 h-12 object-cover rounded-2xl border-2 border-gray-600 bg-stone-900 shadow"
                                    />
                                </div>

                                <div class="flex flex-col ml-3 min-w-0">
                                    <div
                                        class="font-medium leading-none text-gray-100"
                                    >
                                        Pending Request
                                    </div>
                                    <p
                                        class="text-sm text-gray-500 leading-none mt-1 truncate"
                                    >
                                        Jul 066, 2021, 8.25 PM
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col ml-3 min-w-0">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 ml-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center p-4 bg-stone-900 border-red-600 shadow-md hover:shodow-lg rounded-2xl"
                >
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex flex-col">
                                <div
                                    class="font-medium leading-none text-gray-100"
                                >
                                    Delete Your Acccount?
                                </div>
                                <p
                                    class="text-sm text-gray-500 leading-none mt-1"
                                >
                                    By deleting your account.
                                </p>
                            </div>
                        </div>
                        <a
                            class="flex-no-shrink text-xs font-medium tracking-wider text-gray-400 hover:text-green-400 transition ease-in duration-300"
                            ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"
                                /></svg
                        ></a>
                    </div>
                </div>
                <div
                    class="flex flex-col p-4 bg-stone-900 border-red-600 shadow-md hover:shodow-lg rounded-2xl"
                >
                    <div class="flex">
                        <img
                            src="https://images.unsplash.com/photo-1575390730294-dfc5efa5250b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=255&q=80"
                            alt="Just a flower"
                            class="w-16 object-fit h-16 rounded-2xl"
                        />
                        <div
                            class="flex flex-col justify-center w-full px-2 py-1"
                        >
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <h2
                                        class="font-medium leading-none text-gray-100"
                                    >
                                        Massive Dynamic
                                    </h2>
                                </div>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-gray-400 hover:text-green-400 cursor-pointer"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="flex pt-2 text-sm text-gray-500">
                                <div class="flex items-center mr-auto">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-yellow-400 mr-1"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        ></path>
                                    </svg>
                                    <p class="font-normal">4.5</p>
                                </div>
                                <div
                                    class="flex items-center font-medium text-gray-300"
                                >
                                    $1800
                                    <span
                                        class="text-gray-600 text-sm font-normal"
                                    >
                                        /wk</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div
                    class="lg:w-3/5 p-4 bg-stone-900 border-red-600 shadow-md hover:shodow-lg rounded-2xl"
                >
                    <div class="flex-none lg:flex">
                        <div class="h-full w-full lg:h-36 lg:w-36 lg:mb-0 mb-3">
                            <img
                                src="https://images.unsplash.com/photo-1515362778563-6a8d0e44bc0b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80"
                                alt="unsplash images"
                                class="w-full object-scale-down lg:object-cover lg:h-36 rounded-2xl"
                            />
                        </div>
                        <div class="flex-auto lg:ml-3 justify-evenly py-2">
                            <div class="flex flex-col">
                                <div class="flex items-center mr-auto text-sm">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-yellow-300 mr-1"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        ></path>
                                    </svg>
                                    <p class="font-normal text-gray-500">4.5</p>
                                </div>
                                <div
                                    class="flex items-center justify-between min-w-0"
                                >
                                    <h2
                                        class="mr-auto text-base text-gray-100 font-medium truncate"
                                    >
                                        Massive Dynamic
                                    </h2>
                                    <div
                                        class="flex items-center font-medium text-gray-300"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"
                                            ></path>
                                        </svg>
                                        800
                                        <span
                                            class="text-gray-500 text-sm font-normal"
                                        >
                                            /Day</span
                                        >
                                    </div>
                                </div>
                                <p
                                    class="flex items-center text-sm text-gray-400"
                                >
                                    Fortcochi,Cochin . 7km
                                    <span
                                        class="relative inline-flex rounded-md shadow-sm ml-2"
                                    >
                                        <span
                                            class="flex absolute h-2 w-2 top-0 right-0 -mt-1 -mr-1"
                                        >
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"
                                            ></span>
                                            <span
                                                class="relative inline-flex rounded-full h-2 w-2 bg-green-500"
                                            ></span>
                                        </span>
                                    </span>
                                </p>
                            </div>
                            <div
                                class="flex my-3 border-t border-red-600"
                            ></div>
                            <div class="flex space-x-3 text-sm font-medium">
                                <div
                                    class="flex-auto items-center flex space-x-3 text-xs text-gray-500"
                                >
                                    <span>2 Bedroom</span><span>4 Guest</span>
                                </div>
                                <button
                                    class="mb-2 md:mb-0 flex-no-shrink bg-green-400 hover:bg-green-500 px-5 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-gold-1 rounded-full transition ease-in duration-300"
                                    type="button"
                                    aria-label="like"
                                >
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-2/5 ..."></div>
            </div>
        </div>
    </UserLayout>
</template>
