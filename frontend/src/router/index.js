import { createRouter, createWebHistory } from 'vue-router'
import multiguard from 'vue-router-multiguard';
import AuthMiddleware from '../middlewares/AuthMiddleware';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component:()=>import('../views/LoginView.vue'),
    },
    {
      path: '/register',
      name: 'register',
      component:()=>import('../views/RegisterView.vue'),
    },
    {
      path: '/',
      name: 'home',
      component:()=>import('../views/HomeView.vue'),
      beforeEnter: multiguard([AuthMiddleware])
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue'),
      beforeEnter: multiguard([AuthMiddleware])
    }
  ]
})

export default router
