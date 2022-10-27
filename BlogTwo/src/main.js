import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/index.css'
import i18n from './i18n'





router.beforeEach((to, from, next) => {
   let language = to.params.lang;

//    console.log(language);
    if(!language) {
        language = 'en' 
    }

    i18n.global.locale = language
    // console.log(i18n.global.locale = language);
    next();
})

createApp(App).use(i18n).use(router).mount('#app')

