import 'particles.js/particles';

require('./bootstrap');
var newLogin = require('./components/newLogin');

const particlesJS = window.particlesJS;


// Require Vue
window.Vue = require('vue').default;

// Register Vue Components
Vue.component('newLogin', require('./components/newLogin.vue').default);
Vue.component('file-uploader-component', require('./components/FileUploaderComponent.vue').default);


// Initialize Vue
const app = new Vue({
    el: '#app',
    components: {

    }
})
/***********************************************************************/



/***********************************************************************/
