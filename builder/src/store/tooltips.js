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
        tooltips: {
            fields: [
                {
                    typeId: 1,
                    value: ''
                },
                {
                    typeId: 2,
                    value: ''
                },
                {
                    typeId: 3,
                    value: ''
                },
                {
                    typeId: 4,
                    value: ''
                },
                {
                    typeId: 5,
                    value: ''
                },
                {
                    typeId: 6,
                    value: ''
                },
                {
                    typeId: 7,
                    value: ''
                },
                {
                    typeId: 8,
                    value: ''
                }
            ],
            validations: {
                minLength: '',
                maxLength: '',
                minNumber: '',
                maxNumber: '',
                required: '',
                regExp: '',
            },
            slug: i18n.t('tooltip.slug'),
            title: '',
            dateFormat: i18n.t('tooltip.dateFormat'),
            options: '<p>' + i18n.t('tooltip.options') + '</p>'
        }
    },
    getters: {
        tooltips(state) {
            return state.tooltips
        }
    }
}