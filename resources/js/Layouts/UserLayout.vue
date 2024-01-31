<script setup>
import { ref, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import Sidebar from "../Components/Sidebar.vue";
import Footer from "../Components/Footer.vue";
import Alert from "../Components/UI/Alert.vue";
import UserHeader from "../Components/UserHeader.vue";

const page = usePage();
const user = page.props.user.data;
</script>

<template>
    <div class="flex flex-col min-h-screen">
        <Alert
            :message="page.props.flash.message"
            :status="page.props.flash.status"
        />
        <UserHeader :user="user" />
        <div class="main-container flex gradient-gold my-2 py-2 rounded-lg space-x-4">
            <Sidebar />

            <main class="w-full">
                <slot />
            </main>
        </div>

        <Footer />
    </div>
</template>
