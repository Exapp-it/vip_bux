<script>
import { ref } from "vue";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";
import Modal from "../Components/UI/Modal.vue";
export default {
    components: {
        Header,
        Footer,
        Modal,
    },
    setup() {
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

        return {
            showLoginModal,
            showRegisterModal,
            openModal,
            closeLoginModal,
            closeRegisterModal,
        };
    },
};
</script>

<template>
    <Header :open-modal="openModal" />

    <main>
        <slot />
    </main>
    <Footer />
    <Modal
        :modal-type="'login'"
        :show-modal="showLoginModal"
        @close="closeLoginModal"
    >
        <!-- Контент модального окна 1 -->
        <h2>Это модальное окно Авторизации!</h2>
    </Modal>

    <Modal
        :modal-type="'register'"
        :show-modal="showRegisterModal"
        @close="closeRegisterModal"
    >
        <!-- Контент модального окна 2 -->
        <h2>Это модальное окно Регистрации!</h2>
    </Modal>
</template>
