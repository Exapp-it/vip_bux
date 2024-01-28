<script setup>
import { ref, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";
import Modal from "../Components/UI/Modal.vue";
import LoginForm from "../Components/LoginForm.vue";
import RegisterForm from "../Components/RegisterForm.vue";
import Alert from "../Components/UI/Alert.vue";

const page = usePage();

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
    <div class="flex flex-col min-h-screen">
        <Alert
            :message="page.props.flash.message"
            :status="page.props.flash.status"
        />

        <Header :open-modal="openModal" />
        <main class="flex-1">
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
    </div>
</template>
