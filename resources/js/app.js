import './bootstrap';

import { createApp } from "vue";
import Example from "./components/example.vue";

const app = createApp({
    components: {
        Example,
    },
});

app.mount("#app");
