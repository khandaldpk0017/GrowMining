import './bootstrap';
import Login from './components/Login.vue';
import App from './components/App.vue';
import { createApp } from "vue";
import { createPinia } from 'pinia';
import vuetify from "./vuetify";
import router from './router';
import '../../public/vendor/bootstrap/css/bootstrap.min.css';
import '../../public/vendor/animate/animate.css';
import '../../public/vendor/css-hamburgers/hamburgers.min.css';
import '../../public/vendor/animsition/css/animsition.min.css';
import '../../public/vendor/select2/select2.min.css';
import '../../public/vendor/daterangepicker/daterangepicker.css';
import '../../public/vendor/slick/slick.css';
import '../../public/vendor/MagnificPopup/magnific-popup.css';
import '../../public/vendor/perfect-scrollbar/perfect-scrollbar.css';
import '../../public/font-web/font-awesome-4.7.0/css/font-awesome.min.css';
import '../../public/font-web/iconic/css/material-design-iconic-font.min.css';
import '../../public/font-web/linearicons-v1.0.0/icon-font.min.css';
import '../../public/css/util.css';
import '../../public/css/main.css';




import '../../public/js/main.js';
// import '../../public/vendor/jquery/jquery-3.2.1.min.js';
// import '../../public/vendor/animsition/js/animsition.min.js';
// import '../../public/vendor/bootstrap/js/popper.js';
// import '../../public/vendor/bootstrap/js/bootstrap.min.js';
// import '../../public/vendor/select2/select2.min.js';
// import '../../public/vendor/daterangepicker/moment.min.js';
// import '../../public/vendor/daterangepicker/daterangepicker.js';
// import '../../public/vendor/slick/slick.min.js';
import '../../public/js/slick-custom.js';
import '../../public/js/custome-web.js';
// import '../../public/vendor/parallax100/parallax100.js';
// import '../../public/vendor/MagnificPopup/jquery.magnific-popup.min.js';
// import '../../public/vendor/isotope/isotope.pkgd.min.js';

// Function to dynamically load the Font Awesome CDN
function loadFontAwesome() {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css';
    document.head.appendChild(link);
}

// Call the function to load Font Awesome
loadFontAwesome();

const pinia = createPinia();
createApp(App).use(router).use(vuetify).use(pinia).mount("#app");

