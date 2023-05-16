import Vue from 'vue'
import Vuex from 'vuex'

import accordions from "./accordions";
import types from "./types";
import validation from "./validation";
import styles from "./styles";
import data from "./data";
import commonSettings from "./common-settings";
import stylesData from "./styles-data";
import selzyAdditionalFields from "./selzy-additional-fields.js";
import tooltips from "./tooltips";
import VueI18n from "vue-i18n";
import commonMessage from "./common";
import doubleOptin from "./double-optin";

Vue.use(Vuex)
Vue.use(VueI18n);

const i18n = new VueI18n({
  messages: commonMessage
});

export default new Vuex.Store({
  i18n,
  data() {
    i18n.locale = document.getElementById('wpselzy-form').getAttribute('data-lang')
  },
  modules: {
    accordions,
    types,
    validation,
    styles,
    data,
    commonSettings,
    stylesData,
    selzyAdditionalFields,
    tooltips,
    doubleOptin
  }
})