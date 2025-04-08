import { createApp } from "vue";
import Landing from "@/Pages/Landing.vue";
import '@fontsource/lato';

const app = createApp({});
app.component("Landing", Landing);
app.mount("#app");
