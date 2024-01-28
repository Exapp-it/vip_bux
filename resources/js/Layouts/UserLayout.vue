<script setup>
import { ref, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import Sidebar from "../Components/Sidebar.vue";
import Footer from "../Components/Footer.vue";
import Alert from "../Components/UI/Alert.vue";
import UserHeader from "../Components/UserHeader.vue";

const page = usePage();
</script>

<template>
    <div class="flex flex-col min-h-screen">
        <Alert
            :message="page.props.flash.message"
            :status="page.props.flash.status"
        />
        <UserHeader />
        <div class="main-container flex  gradient-gold my-2 py-2 rounded-lg">
            <Sidebar />

            <main class="p-2">
                <slot />
            </main>
        </div>

        <Footer />
    </div>
</template>
