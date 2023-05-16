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
        types: [
            {
                id: 1,
                name: i18n.t('field.name')
            },
            {
                id: 2,
                name: 'Email'
            },
            {
                id: 3,
                name: i18n.t('field.phone')
            },
            {
                id: 4,
                name: i18n.t('field.text')
            },
            {
                id: 5,
                name: i18n.t('field.number')
            },
            {
                id: 6,
                name: i18n.t('field.select')
            },
            {
                id: 7,
                name: i18n.t('field.boolean')
            },
            {
                id: 8,
                name: i18n.t('field.date')
            },
        ]
    },
    mutations: {},
    actions: {},
    getters: {
        types(state) {
            return state.types
        }
    }
}