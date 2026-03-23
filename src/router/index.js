import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CSSChallengeView from '../views/CSSChallengesView.vue'
import MediaQueryView from '@/views/MediaQueryView.vue'
import LeesbareTekstenView from '@/views/LeesbareTekstenView.vue'
import CSSView from '@/views/CSSView.vue'
import PokemonListView from '@/views/PokemonListView.vue'
import PokemonDetailView from '@/views/PokemonDetailView.vue'
import PokemonAbilityView from '@/views/PokemonAbilityView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/css',
    name: 'CSS',
    component: CSSChallengeView
  },
  {
    path: '/css/:id',
    name: 'css-item',
    component: CSSView
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
  }, 
  {
    path: '/pokemon',
    name: 'pokemonlist',
    component: PokemonListView
  },
  {
    path: '/pokemon/:pokemonName',
    name: 'PokemonDetails',
    component: PokemonDetailView
  },
  {
    path: '/pokemon/ability/:abilityName',
    name: 'AbilityDetails',
    component: PokemonAbilityView
  }
]

const router = createRouter({
  history: createWebHistory('/i-love-web/'),
  routes
})

export default router
