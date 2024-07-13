import { createRouter, createWebHistory } from 'vue-router'
import IndexView from '../views/IndexView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: IndexView
    },
    {
      path: '/product_list',
      name: 'product_list',
      component: () => import('../views/product_list.vue')
    },
    {
      path: '/product_detail/:product_id',
      name: 'product_detail',
      component: () => import('../views/product_detail.vue'),
    },
    // detail 沒給 id 則回 list
    {
      path: '/product_detail',
      redirect: 'product_list'
    },
    {
      path: '/cart',
      name: 'cart',
      component: () => import('../views/CartView.vue'),
    },
    {
      path: '/latestDiscount',
      name: 'latestDiscount',
      component: () => import('../views/discount.vue'),
    },
    {
      path: '/discount_detail',
      name: 'discount_detail',
      component: () => import('../views/discount_detail.vue'),
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router
