require("./bootstrap");
import BootstrapVue from "bootstrap-vue";
import VueRouter from "vue-router";
import Vue from "vue";
import "bootstrap-vue/dist/bootstrap-vue.css";
import routes from "./routes";

Vue.use(BootstrapVue);
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "hash",
    routes
});

const app = new Vue({
    router
}).$mount("#app");
