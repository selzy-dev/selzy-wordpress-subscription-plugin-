import commonMessage from './common'
import VueI18n from 'vue-i18n'
import Vue from "vue";

Vue.config.productionTip = false
Vue.use(VueI18n);

const i18n = new VueI18n({
    messages: commonMessage,
    locale: document.getElementById('wpselzy-form').getAttribute('data-lang')
});
export default {
    state: {
        doubleOptin: [
            {
                value: 3,
                label: i18n.t('double_optin.double_optin_3')
            },
            {
                value: 0,
                label: i18n.t('double_optin.double_optin_0')
            },
            {
                value: 4,
                label: i18n.t('double_optin.double_optin_4')
            }
        ]
    },
    mutations: {},
    actions: {},
    getters: {
        doubleOptin(state) {
            return state.doubleOptin
        }
    }
}