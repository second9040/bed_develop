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
      path: '/experience_site',
      name: 'experience_site',
      component: () => import('../views/experience_site.vue'),
    },
    {
      path: '/bed_knowledge',
      name: 'bed_knowledge',
      component: () => import('../views/bed_knowledge.vue'),
    },
    {
      path: '/bed_knowledge_detail',
      name: 'bed_knowledge_detail',
      component: () => import('../views/bed_knowledge_detail.vue'),
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ],
  scrollBehavior(to, from, savedPosition) {
    return new Promise((resolve) => {
      if (to.hash) {
        // 使用 setTimeout 來確保 DOM 已經更新
        setTimeout(() => {
          const element = document.querySelector(to.hash)
          if (element) {
            const offset = window.innerWidth > 1199 ? 100 : 66 // 偏移量，可以根據需要調整
            const elementPosition = element.getBoundingClientRect().top
            const offsetPosition = elementPosition + window.pageYOffset - offset

            window.scrollTo({
              top: offsetPosition,
              behavior: 'smooth'
            })
          }
          resolve()
        }, 100)
      } else {
        resolve({
          top: 0,
          behavior: 'smooth'
        })
      }
    })
  },
})

export default router
