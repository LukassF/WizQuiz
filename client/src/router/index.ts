import { createRouter, createWebHashHistory, RouteRecordRaw } from "vue-router";
import LandingView from "../views/landing/LandingView.vue";
import DashboardView from "../views/dashboard/DashboardView.vue";
import CreateView from "../views/create/CreateView.vue";
import store from "@/store";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/",
    name: "landing",
    component: LandingView,
  },

  {
    path: "/dashboard",
    name: "dashboard",
    component: DashboardView,
  },

  {
    path: "/create",
    name: "create",
    component: CreateView,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes: routes,
});

router.beforeEach((to, from) => {
  console.log(store.state.isAuthenticated);
});

export default router;
