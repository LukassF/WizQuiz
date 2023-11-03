import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import ToastService from "primevue/toastservice";
import Toast from "primevue/toast";
import PrimeVue from "primevue/config";
import VueCookies from "vue-cookies";

import "./style.css";
import "primevue/resources/primevue.min.css";
import "primevue/resources/themes/lara-light-blue/theme.css";
import "primeicons/primeicons.css";

const app = createApp(App);
app.component("Toast", Toast);

app
  .use(VueCookies)
  .use(store)
  .use(router)
  .use(PrimeVue)
  .use(ToastService)
  .mount("#app");
