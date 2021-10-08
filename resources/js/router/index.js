import {createWebHistory, createRouter} from "vue-router";
import store from "../store";

export const routes = [
    {
        path: '/:authPage?',
        name: 'home',
        component: () => import('../components/Home'),
        // component: () => import('../components/Note/Index'),
        props: true,
        meta: {
            guest: true
        }
    },
    {
        path: '/note',
        name: 'note',
        component: () => import('../components/Note/Index'),
        meta: {
            requiresAuth: true,
        }
    },
     {
        path: '/:pathMatch(.*)*',
        name: '404',
        component: () => import('../components/NotFound'),
        meta: {
            guest: true,
        }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

router.beforeEach((to, from, next ) => {
  if(to.matched.some(record => record.meta.requiresAuth)) {
    if(!store.getters.isAuthenticated) {
      next({path: '/login'});
    }
  }
  next()
});

export default router;
