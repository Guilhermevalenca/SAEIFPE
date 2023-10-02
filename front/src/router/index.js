// Composables
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    component: () => import('@/layouts/default/Default.vue'),
    children: [
      {
        path: '',
        name: 'Home',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "home" */ '@/views/Home.vue'),
      },
      {
        path: 'about',
        name: 'AboutDefault',
        component: () => import('@/layouts/About.vue'),
        children: [
          {
            path: '',
            name: 'AboutView',
            component: () => import('@/views/AboutView.vue')
          }
        ]
      },
      {
        path: 'posts',
        name: 'postsDefault',
        component: () => import('@/layouts/posts/Posts.vue'),
        children: [
          {
            path: '',
            name: 'postsView',
            component: () => import('@/views/PostsView.vue')
          }
        ]
      },
      {
        path: 'form',
        name: 'formDefault',
        component: () => import('@/layouts/form/Form.vue'),
        children: [
          {
            path: '',
            name: 'formView',
            component: () => import('@/views/FormView.vue')
          }
        ]
      }
    ],
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

export default router
