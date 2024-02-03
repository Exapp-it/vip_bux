<script setup>
import { usePage, useForm, router } from "@inertiajs/vue3";
import UserLayout from "../../Layouts/UserLayout.vue";
import Alert2 from "../../Components/UI/Alert2.vue";
import { onMounted, ref, toRef } from "vue";

const { genders, occupations } = defineProps([
    "title",
    "genders",
    "occupations",
]);

const page = usePage();
const user = page.props.user.data;

const fileInput = ref();
const imgaeUrl = ref(
    user.profile.avatar
        ? user.profile.avatar
        : "https://static-00.iconduck.com/assets.00/avatar-loading-icon-512x512-l0wcoglv.png"
);

const profilePresonalForm = useForm({
    name: user.profile.name,
    lastname: user.profile.lastname,
    birthday: user.profile.birthday,
    gender: user.profile.gender ?? "null",
    occupation: user.profile.occupation,
});

const profileContantcForm = useForm({
    phone: user.contact.phone,
    vk: user.contact.vk,
    telegram: user.contact.telegram,
    instagram: user.contact.instagram,
    youtube: user.contact.youtube,
});

const profilePasswordForm = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const profilePinCodeForm = useForm({
    code: user.code,
    password: "",
});

const updatePersonal = () => {
    profilePresonalForm.put(route("user.profile.update.personal", user));
};

const updateContact = () => {
    profileContantcForm.put(route("user.profile.update.contact", user));
};

const changePassword = () => {
    profilePasswordForm.put(route("user.profile.update.password", user));
};

const creaetOrUpdatePinCobe = () => {
  profilePinCodeForm.put(route("user.profile.update.code", user));
};

const handleUploadImage = () => {
    const file = fileInput.value.files[0];

    if (file) {
        imgaeUrl.value = URL.createObjectURL(file);
        const formData = new FormData();
        formData.append("avatar", file);
        router.post(route("user.profile.upload.avatar", user), formData);
    } else {
        console.error("Ошибка: файл не выбран");
    }
};
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
            <div
                class="flex flex-col bg-stone-900 border border-red-600 shadow-lg rounded-2xl p-4"
            >
                <div class="relative h-32 w-32 mb-3 mx-auto">
                    <img
                        :src="imgaeUrl"
                        alt="Avatar"
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
                        <input
                            type="file"
                            accept="image/*"
                            class="hidden"
                            ref="fileInput"
                            @input="handleUploadImage"
                        />
                    </label>
                </div>
                <div class="flex space-x-4 mt-10">
                    <div class="w-full">
                        <h2 class="text-gold-1 font-semibold mb-5">
                            Личные данные
                        </h2>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Имя
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="profilePresonalForm.name"
                                        type="text"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Фамилия
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="profilePresonalForm.lastname"
                                        type="text"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold"
                                        >
                                            Дата рождения
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="profilePresonalForm.birthday"
                                        type="date"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Пол
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <select
                                        v-model="profilePresonalForm.gender"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    >
                                        <option
                                            v-for="(label, value) in genders"
                                            :key="value"
                                            :value="value"
                                        >
                                            {{ label }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold"
                                        >
                                            Вид деятельности
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <select
                                        v-model="profilePresonalForm.occupation"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    >
                                        <option selected disabled value="">
                                            Выбрать...
                                        </option>
                                        <option
                                            v-for="(
                                                label, value
                                            ) in occupations"
                                            :key="value"
                                            :value="value"
                                        >
                                            {{ label }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end w-full mt-8">
                            <button
                                @click="updatePersonal"
                                class="inline-block rounded gradient-gold px-6 py-2 text-sm font-medium text-gray-800 transition duration-500 hover:scale-110 focus:outline-none focus:ring focus:ring-gold-2"
                            >
                                Сохранить
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-4 mt-10">
                    <div class="w-full">
                        <h2 class="text-gold-1 font-semibold mb-5">
                            Контакные данные
                        </h2>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Телефон
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="profileContantcForm.phone"
                                        type="text"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            VK
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="profileContantcForm.vk"
                                        type="text"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Telegram
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="profileContantcForm.telegram"
                                        type="text"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Instagram
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="profileContantcForm.instagram"
                                        type="text"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Youtube
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="profileContantcForm.youtube"
                                        type="text"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end w-full mt-8">
                            <button
                                @click="updateContact"
                                class="inline-block rounded gradient-gold px-6 py-2 text-sm font-medium text-gray-800 transition duration-500 hover:scale-110 focus:outline-none focus:ring focus:ring-gold-2"
                            >
                                Сохранить
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-4 mt-10">
                    <div class="w-full">
                        <h2 class="text-gold-1 font-semibold mb-5">
                            Смена пароля
                        </h2>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Текущий
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="
                                            profilePasswordForm.current_password
                                        "
                                        type="password"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Новый
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="profilePasswordForm.password"
                                        type="password"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Повторите
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="
                                            profilePasswordForm.password_confirmation
                                        "
                                        type="password"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end w-full mt-8">
                            <button
                                @click="changePassword"
                                class="inline-block rounded gradient-gold px-6 py-2 text-sm font-medium text-gray-800 transition duration-500 hover:scale-110 focus:outline-none focus:ring focus:ring-gold-2"
                            >
                                Сменить пароль
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-4 mt-10">
                    <div class="w-full">
                        <h2 class="text-gold-1 font-semibold mb-5">
                            Пин код
                        </h2>
                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Пин
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="
                                            profilePinCodeForm.code
                                        "
                                        type="number"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center w-full mb-3">
                            <div
                                class="flex items-center bg-white w-full rounded-lg"
                            >
                                <div>
                                    <span
                                        class="flex items-center gradient-gold w-28 h-12 rounded-l-lg px-3"
                                    >
                                        <span
                                            class="text-sm text-gray-900 font-semibold text-nowrap"
                                        >
                                            Пароль
                                        </span>
                                    </span>
                                </div>
                                <div class="w-full">
                                    <input
                                        v-model="profilePinCodeForm.password"
                                        type="password"
                                        class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end w-full mt-8">
                            <button
                                @click="creaetOrUpdatePinCobe"
                                class="inline-block rounded gradient-gold px-6 py-2 text-sm font-medium text-gray-800 transition duration-500 hover:scale-110 focus:outline-none focus:ring focus:ring-gold-2"
                            >
                                Сменить пароль
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </UserLayout>
</template>
