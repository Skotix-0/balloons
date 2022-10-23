import { createRouter, createWebHistory } from 'vue-router'
import LatexBalloons from '../views/LatexBalloons.vue'
import FoilBalloons from '../views/FoilBalloons.vue'

const routes = [
  {
    path: '/LatexBalloons',
    name: 'LatexBalloons',
    component: LatexBalloons
  },
  {
    path: '/FoilBalloons',
    name: 'FoilBalloons',
    component: FoilBalloons
  },
  {
    path: '/contact',
    name: 'contact',
    component: () => import(/* webpackChunkName: "about" */ '../views/ContactView.vue')
  },
  {
    path: '/product-card',
    name: 'product-card',
    component: () => import( '../views/ProductCard.vue' )
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

// history: createWebHistory(),
export default router
