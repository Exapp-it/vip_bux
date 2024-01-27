<script setup>
import { ref, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";
import Modal from "../Components/UI/Modal.vue";
import LoginForm from "../Components/LoginForm.vue";
import RegisterForm from "../Components/RegisterForm.vue";

const page = usePage();

console.log(page.props);
const showLoginModal = ref(false);
const showRegisterModal = ref(false);

const openModal = (modalType) => {
    if (modalType === "login") {
        showLoginModal.value = true;
    } else if (modalType === "register") {
        showRegisterModal.value = true;
    }
};

const closeLoginModal = () => {
    showLoginModal.value = false;
};

const closeRegisterModal = () => {
    showRegisterModal.value = false;
};
</script>

<template>
    <div class="relative">
        <div
            class="absolute z-50 top-0 right-0 mr-5 mt-3 bg-red-600 text-white text-lg rounded-lg shadow-2xl font-semibold p-5"
            v-if="$page.props.flash.message"
        >
            <span>{{ $page.props.flash.message }}</span>
        </div>
    </div>

    <Header :open-modal="openModal" />
    <main class="min-h-[100vh]">
        <slot />
    </main>
    <Footer />
    <Modal
        :modal-type="'login'"
        :show-modal="showLoginModal"
        @close="closeLoginModal"
    >
        <LoginForm />
    </Modal>

    <Modal
        :modal-type="'register'"
        :show-modal="showRegisterModal"
        @close="closeRegisterModal"
    >
        <RegisterForm />
    </Modal>
</template>
