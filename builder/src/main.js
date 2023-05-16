import Vue from 'vue'
import App from './App.vue'
import store from './store'
import vuetify from '@/plugins/vuetify'
import VueI18n from 'vue-i18n'
import './assets/scss/main.scss'
import commonMessage from './store/common'

Vue.config.productionTip = false
Vue.use(VueI18n);

const i18n = new VueI18n({
    messages: commonMessage
});

new Vue({
    store,
    vuetify,
    render: h => h(App),
    i18n,
    data() {
        i18n.locale = document.getElementById('wpselzy-form').getAttribute('data-lang')
        window.__LOCALE__ = i18n.locale
    }
}).$mount('#selzy-form-builder')
