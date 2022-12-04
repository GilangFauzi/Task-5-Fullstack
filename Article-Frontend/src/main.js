import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

import 'bootstrap'
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.min";
// import 'bootstrap-icons/icons'
import "@fortawesome/fontawesome-free/css/all.css";
import "@fortawesome/fontawesome-free/js/all.js";

// import 'jquery/dist/jquery.min'
import "popper.js/dist/popper.min";
// import './index.css'


// createApp(App).mount('#app')
const app = createApp(App);
app.use(router);
app.mount("#app");
