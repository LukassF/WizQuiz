import { createRouter, createWebHashHistory, RouteRecordRaw } from 'vue-router'
import LandingView from '../views/landing/LandingView.vue'
import DashboardView from '../views/dashboard/DashboardView.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'landing',
    component: LandingView
  },

  {
    path:'/dashboard',
    name:'dashboard',
    component: DashboardView
  }

  // {
  //   path: '/about',
  //   name: 'about',
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  // }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes:routes
})

export default router
