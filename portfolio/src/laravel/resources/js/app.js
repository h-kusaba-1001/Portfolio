/* eslint no-unused-vars: 0, no-undef: 0 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

import vuetify from "./Vue/lib/vuetify";
import router from "./Vue/lib/router";
import vuex from "./Vue/lib/vuex";

// blade.php向けに、別途vuetifyのコンポーネントを読み込んでおく
import { VApp, VProgressLinear, VMain, VContainer } from "vuetify/lib";

const axiosBase = require("axios");
const axios = axiosBase.create({
    headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
    },
    responseType: "json",
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
const files = require.context("./Vue", true, /\.vue$/i);
files
    .keys()
    .map((key) =>
        Vue.component(key.split("/").pop().split(".")[0], files(key).default)
    );

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('navigation', require('./components/common/Navigation.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Filters
import DateFilter from "./Vue/filters/Date";
// filter
Vue.filter("date", DateFilter);
Vue.filter("truncate", function (value, limit) {
    return value.substring(0, limit);
});
Vue.filter("tailing", function (value, tail) {
    return value + tail;
});

const app = new Vue({
    el: "#app",
    vuetify: vuetify,
    router: router,
    store: vuex,
    components: {
        VApp,
        VProgressLinear,
        VMain,
        VContainer,
    },
    data() {
        return {};
    },
    created() {
        this.$store.commit("gonnaLoading");
    },
    beforeMount() {
        this.$store.commit("loaded");
    },
});
