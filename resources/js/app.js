import "../css/App.css";
import { createApp, h } from "vue";
import { Link, createInertiaApp, Head } from "@inertiajs/vue3";
import { ZiggyVue } from "ziggy-js";
import AppLayout from "./Layouts/AppLayout.vue";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        console.log(page.default);
        page.default.layout = page.default.layout || AppLayout;
        return page;
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("Head", Head)
            .component("Link", Link)
            .mount(el);
    },
    progress: {
        delay: 250,
        color: "#B88A44",
        includeCSS: true,
        showSpinner: true,
    },
});
