import { createRouter, createWebHistory  } from 'vue-router'
import Home from '../views/Home/index.vue'
import { h, resolveComponent } from 'vue'  // import `resolveComponent` too
import i18n from '../i18n'
// import i18n from '../i18n'


 const routes = [

    {
    path: '/',
    redirect: `${i18n.global.locale}`
    },

  {  
    path: '/:lang',
    component: {
      render() {
        return h(resolveComponent('router-view'))
              }
    },
    children: [
    {
      path: '',
      name: 'All',
      component: Home
    },
     {
      path: 'home',
      name: 'Home',
      component: Home
    },
    {
      path: 'about',
      name: 'About',
      component: () => import(/* webpackChunkName: "about" */ '../views/About/index.vue')
    },
    {
      path: 'contact',
      name: 'Contact',
      component: () => import(/* webpackChunkName: "Contact" */ '../views/Contact/index.vue')
    },
      {
      path: 'articles',
      name: 'articles.index',
      component: () => import(/* webpackChunkName: "Articles" */ '../views/Articles/index.vue')
    },
      {
      path: 'articles/:slug',
      name: 'articles.show',
      component: () => import(/* webpackChunkName: "Articles details" */ '../views/Articles/show.vue'),
      props: true,
    }
    ]
}
]


const router = createRouter({ history: createWebHistory(), routes })
export default router
