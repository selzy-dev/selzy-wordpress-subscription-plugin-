<template>
    <v-app>
        <div class="b-selzy-app">
            <div class="b-selzy-app__inner">
                <div class="b-selzy-app__block">
                    <div class="b-selzy-app__title">
                        {{ $t('message.generalSettings') }}
                    </div>
                    <CommonSettings></CommonSettings>
                </div>
                <div class="b-selzy-app__block">
                    <div class="b-selzy-app__title">
                        {{ $t('field.title') }}
                    </div>
                    <App></App>
                </div>
            </div>
        </div>
    </v-app>
</template>

<script>
import App from '@/views/app'
import CommonSettings from '@/views/common-settings'

export default {
    components: {
        App,
        CommonSettings
    },
    data() {
        return {
            selzyHiddenField: document.querySelector('[data-selzy-hidden-field]'),
            selzyHiddenFieldStartValue: null,
            selzyAdditionalFields: null

        }
    },
    created() {
        // eslint-disable-next-line no-undef
        if (typeof SELZY_ADDITIONAL_FIELDS !== 'undefined') {
            // eslint-disable-next-line no-undef
            this.selzyAdditionalFields = SELZY_ADDITIONAL_FIELDS
            this.$store.dispatch('setAdditionalFields', this.selzyAdditionalFields)
        }
        if (this.selzyHiddenField) {
            this.selzyHiddenFieldStartValue = this.selzyHiddenField.getAttribute('value')

            if (this.selzyHiddenFieldStartValue) {
                this.$store.dispatch('setStartData', this.selzyHiddenFieldStartValue)
            } else {
                this.$store.dispatch('initAccordions')
                this.$store.dispatch('setDefaultCommonSettingsStyles')
            }
        }
    },
    methods: {},
    computed: {
        data() {
            return this.$store.getters.data
        }
    },
    watch: {
        data: {
            deep: true,
            handler() {
                if (this.selzyHiddenField) {
                    this.selzyHiddenField.setAttribute('value', JSON.stringify(this.data))
                }
            }
        }
    }
}
</script>
