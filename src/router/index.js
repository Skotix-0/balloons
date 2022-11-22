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
    path: '/delivery',
    name: 'delivery',
    component: () => import(/* webpackChunkName: "about" */ '../views/DeliveryView.vue')
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
