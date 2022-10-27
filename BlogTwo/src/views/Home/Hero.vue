<template>
  <div class="relative z-0 hero-height">
      <img :src="settings.hero_image_url" alt="hero" class="block w-full h-full object-cover">
      <div class="absolute inset-0 bg-black opacity-50"></div>

      <div class="px-4 sm:px-8 absolute inset-0 text-white">
          <div class="container mx-auto h-full flex flex-col justify-center">
              <div>{{ $t('title.welcome to') }}</div>

              <div class="mt-1 text-6xl font-bold">
            <span :class="{ 'sm:text-white': !showWhiteBackground}">IXIS</span>
            <span :class="{'sm:text-blue-400': showWhiteBackground}" class="text-red-500">CYBER</span>
              </div>
              <div class="mt-2 sm:w-1/2">{{ $t('general.Home Description') }}</div>

               <div  :class="{'sm:text-blue-400': showWhiteBackground}"  class="mt-3 text-red-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
          </div>
          </div>
      </div>
  </div>
</template>

<script>

import { useSettings } from '@/composables/useSetting.js'
import { useI18n } from "vue-i18n";
import { ref } from '@vue/reactivity';



export default {

 setup() {
    let { settings } = useSettings();
    let { t } = useI18n();
    let showWhiteBackground = ref(false);

   document.addEventListener("scroll",function(){
            let bodyTopPosition = document.body.getBoundingClientRect().top;

            if(bodyTopPosition < -100){
                showWhiteBackground.value = true;
            }else{
                showWhiteBackground.value = false;
            }
        })

    return {
          settings,
          t,
          showWhiteBackground,
    }
  }
}
</script>