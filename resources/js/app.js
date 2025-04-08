import { createApp } from "vue";
import App from "@/App.vue";
import "@fontsource/lato";

const app = createApp({});
app.component("App", App);
app.mount("#app");
