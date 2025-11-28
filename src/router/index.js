import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import MediaQueryView from '@/views/MediaQueryView.vue'
import LeesbareTekstenView from '@/views/LeesbareTekstenView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    component: AboutView
  },
  {
    path: '/mediaquery',
    name: 'mediaquery',
    component: MediaQueryView
  },
  {
    path: '/LeesbareTeksten',
    name: 'LeesbareTeksten',
    component: LeesbareTekstenView
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
