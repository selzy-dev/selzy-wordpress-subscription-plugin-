<template>
    <div class="b-selzy-app-common-settings b-selzy-app__common-settings">
        <div class="b-selzy-app-common-settings__header">
            <div class="b-selzy-app-common-settings__tab-buttons">
                <div class="b-selzy-app-common-settings__tab-button"
                     v-for="(item, index) in tabs.buttons"
                     :key="`tab-button-${index}`"
                     :class="index === activeTab ? 'active' : ''"
                     @click="handleTabButtonClick(index)"
                >
                    {{item}}
                </div>
            </div>
            <div class="b-selzy-app-common-settings__toggle-button"
                 :class="showContent ? 'active' : ''"
                 @click="tabContentShowButtonHandle">
                <span></span>
            </div>
        </div>
        <div class="b-selzy-app-common-settings__main"
            :class="showContent ? 'active' : ''"
        >
            <div class="b-selzy-app-common-settings__tab-content"
                :class="activeTab === 0 ? 'active' : ''"
            >
                <CommonSettingForm></CommonSettingForm>
            </div>
            <div class="b-selzy-app-common-settings__tab-content"
                :class="activeTab === 1 ? 'active' : ''"
            >
                <CommonSettingMessages></CommonSettingMessages>
            </div>
          <div class="b-selzy-app-common-settings__tab-content"
               :class="activeTab === 2 ? 'active' : ''"
          >
            <CommonSettingsSettingsSend></CommonSettingsSettingsSend>
          </div>
        </div>
    </div>
</template>

<script>
import CommonSettingForm from '@/components/common-settings-form'
import CommonSettingMessages from '@/components/common-settings-messages'
import CommonSettingsSettingsSend from "@/components/common-settings-settings-send";
export default {
    components: {
        CommonSettingForm,
        CommonSettingMessages,
        CommonSettingsSettingsSend,
    },
    data() {
        return {
            activeTab: 0,
            tabs: {
                buttons: [this.$i18n.t('form.title'), this.$i18n.t('message.title'), this.$i18n.t('double_optin.title')]
            },
            showContent: true
        }
    },
    methods: {
        handleTabButtonClick(index) {
            this.activeTab = index
        },
        tabContentShowButtonHandle() {
            this.showContent = !this.showContent
        }
    }
}
</script>