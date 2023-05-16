<template>
    <v-row>
        <v-col cols="12" md="6">
            <v-row>
                <v-col cols="12">
                    <div class="b-block-title">
                        {{ $t('message.notification') }}
                    </div>
                </v-col>
                <v-col cols="12">
                    <Field
                        :title="$t('message.successSubscribe')"
                        :value="successText"
                        @updateValue="updateSuccessText"
                    ></Field>
                </v-col>
                <v-col cols="12">
                    <Field
                        :title="$t('message.validationError')"
                        :value="validationErrorText"
                        @updateValue="updateValidationErrorText"
                    ></Field>
                </v-col>
                <v-col cols="12">
                    <Field
                        :title="$t('message.serverError')"
                        :value="serverErrorText"
                        @updateValue="updateServerErrorText"
                    ></Field>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="12" md="6">
            <v-row>
                <v-col cols="12">
                    <div class="b-block-title">
                        {{ $t('field.validate') }}
                    </div>
                </v-col>
                <v-col cols="12">
                    <Field
                        :title="$t('message.minLength')"
                        :value="minLengthErrorText"
                        @updateValue="updateMinLengthErrorText"
                    ></Field>
                </v-col>
                <v-col cols="12">
                    <Field
                        :title="$t('message.maxLength')"
                        :value="maxLengthErrorText"
                        @updateValue="updateMaxLengthErrorText"
                    ></Field>
                </v-col>
                <v-col cols="12">
                    <Field
                        :title="$t('message.minNumber')"
                        :value="minNumberErrorText"
                        @updateValue="updateMinNumberErrorText"
                    ></Field>
                </v-col>
                <v-col cols="12">
                    <Field
                        :title="$t('message.maxNumber')"
                        :value="maxNumberErrorText"
                        @updateValue="updateMaxNumberErrorText"
                    ></Field>
                </v-col>
<!--                <v-col cols="12">-->
<!--                    <Field-->
<!--                        :title="$t('field.regExp')"-->
<!--                        :value="regExpErrorText"-->
<!--                        @updateValue="updateRegExpErrorText"-->
<!--                    ></Field>-->
<!--                </v-col>-->
                <v-col cols="12">
                    <Field
                        :title="$t('field.required')"
                        :value="requiredErrorText"
                        @updateValue="updateRequiredErrorText"
                    ></Field>
                </v-col>
                <v-col cols="12">
                    <Field
                        :title="'Email'"
                        :value="emailErrorText"
                        @updateValue="updateEmailErrorText"
                    ></Field>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</template>

<script>
import Field from '@/components/field'
export default {
    components: {
        Field
    },
    data() {
        return {}
    },
    methods: {
        updateSuccessText(value) {
            this.$store.dispatch('editCommonSettingsMessages', {
                successText: value
            })
        },
        updateValidationErrorText(value) {
            this.$store.dispatch('editCommonSettingsMessages', {
                validationErrorText: value
            })
        },
        updateServerErrorText(value) {
            this.$store.dispatch('editCommonSettingsMessages', {
                serverErrorText: value
            })
        },
        updateMinLengthErrorText(value) {
            this.$store.dispatch('editCommonSettingsMessages', {
                minLengthErrorText: value
            })
        },
        updateMaxLengthErrorText(value) {
            this.$store.dispatch('editCommonSettingsMessages', {
                maxLengthErrorText: value
            })
        },
        updateMinNumberErrorText(value) {
            this.$store.dispatch('editCommonSettingsMessages', {
                minNumberErrorText: value
            })
        },
        updateMaxNumberErrorText(value) {
            this.$store.dispatch('editCommonSettingsMessages', {
                maxNumberErrorText: value
            })
        },
        updateRegExpErrorText(value) {
            this.$store.dispatch('editCommonSettingsMessages', {
                regExpErrorText: value
            })
        },
        updateRequiredErrorText(value) {
            this.$store.dispatch('editCommonSettingsMessages', {
                requiredErrorText: value
            })
        },
        updateEmailErrorText(value) {
            this.$store.dispatch('editCommonSettingsMessages', {
                emailErrorText: value
            })
        }
    },
    computed: {
        successText() {
          return this.$store.getters.commonSettingsMessages.successText
        },
        validationErrorText() {
          return this.$store.getters.commonSettingsMessages.validationErrorText
        },
        serverErrorText() {
          return this.$store.getters.commonSettingsMessages.serverErrorText
        },
        minLengthErrorText() {
          return this.$store.getters.commonSettingsMessages.minLengthErrorText
        },
        maxLengthErrorText() {
          return this.$store.getters.commonSettingsMessages.maxLengthErrorText
        },
        minNumberErrorText() {
          return this.$store.getters.commonSettingsMessages.minNumberErrorText
        },
        maxNumberErrorText() {
          return this.$store.getters.commonSettingsMessages.maxNumberErrorText
        },
        regExpErrorText() {
          return this.$store.getters.commonSettingsMessages.regExpErrorText
        },
        requiredErrorText() {
          return this.$store.getters.commonSettingsMessages.requiredErrorText
        },
        emailErrorText() {
            return this.$store.getters.commonSettingsMessages.emailErrorText
        }
    }
}
</script>