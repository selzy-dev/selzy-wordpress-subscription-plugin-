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
        additionalFields: [
            {
                key: i18n.t('field.key'),
                value: null
            }
        ]
    },
    mutations: {
        setAdditionalFields(state, payload) {
            const data = JSON.parse(payload)
            data.forEach(item => {
                state.additionalFields.push({
                    key: item.name,
                    value: item.name
                })
            })
        }
    },
    actions: {
        setAdditionalFields({commit}, payload) {
            commit('setAdditionalFields', payload)
        }
    },
    getters: {
        additionalFields(state) {
            return state.additionalFields
        }
    },
}