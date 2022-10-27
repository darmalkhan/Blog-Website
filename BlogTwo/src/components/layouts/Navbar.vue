<template>
    <nav id="navbar" 
    class="px-4 py-4 sm:py-4 bg-white shadow sm:fixed w-full z-10 duration-500" 
    :class="{'sm:bg-transparent sm:shadow-none': !showWhiteBackground}">
    <div class="container mx-auto flex flex-col sm:flex-row items-center justify-between">
        <div class="w-full flex flex-row items-center justify-between">
            <div class="text-3xl font-bold">
                <a :href="`/${$i18n.locale}/home`">
                    <span :class="{ 'sm:text-white': !showWhiteBackground}">IXIS</span>
                    <span :class="{'sm:text-blue-400': showWhiteBackground}" class="text-red-500">CYBER</span>
                </a>
        </div>

        <div>
            <button v-show="!isVisable" class="sm:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <button v-show="isVisable" class="sm:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        </div>

        <div :class="{ 'hidden': !isVisable , 'sm:text-white': !showWhiteBackground }" class="mt-4 sm:mt-0 w-full sm:space-x-4 sm:text-right sm:block text-black">
            <NovbarLink @click="toggle" :to="`/${$i18n.locale}/home`" :label="t('naz.Home')" />
            <NovbarLink @click="toggle" :to="`/${$i18n.locale}/articles`" :label="t('naz.Articles')"/>
            <NovbarLink @click="toggle" :to="`/${$i18n.locale}/about`" :label="t('naz.About')"/>
            <NovbarLink @click="toggle" :to="`/${$i18n.locale}/contact`"  :label="t('naz.Contact')"/>
        </div>
        <div :class="{'sm:text-white': !showWhiteBackground }" class="mt-4 sm:mt-0 sm:text-right sm:block text-gray-500">
            <LangSwitcher />
        </div>

    </div>    
    </nav>
</template>

<script>
import NovbarLink from "./NavbarLink";
import { useToggle } from "@/composables/useToggle";
import { ref } from '@vue/reactivity';
import { useI18n } from "vue-i18n";
import LangSwitcher from '../LangSwitcher'



export default {
    components: {
        NovbarLink,
        LangSwitcher
    },

    props: {},

    setup() {
        let { isVisable, toggle } = useToggle();
        let showWhiteBackground = ref(false);
        let { t } = useI18n();


        document.addEventListener("scroll",function(){
            let bodyTopPosition = document.body.getBoundingClientRect().top;

            if(bodyTopPosition < -100){
                showWhiteBackground.value = true;
            }else{
                showWhiteBackground.value = false;
            }
        })

        return{
            isVisable,
            toggle,
            showWhiteBackground,
            t,
            }
    },
};
</script>
