import { createApp } from "vue";
import Landing from "@/Pages/Landing.vue";

const app = createApp({});
app.component("Landing", Landing);
app.mount("#app");
