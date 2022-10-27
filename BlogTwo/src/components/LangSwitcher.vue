<template>
  <div class="relative mb-23">
  <button @click="show = !show"
  @keyup.esc="show = false" 
   class="block sm:inline-block sm:px-4 py-2 hover:text-blue-400 transition-colors duration-300 bg-none">
    <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
    </svg>
    </span>
  </button>
  <div @mouseleave="show = false">
  <div v-show="show" class="absolute flex flex-col items-start py-2 px-5 mt-1 text-black bg-gradient-to-t bg-gray-200 opacity-70 rounded-lg">
    <a @click.prevent="setLocale('en')" class="px-3 py-1 hover:text-gray-500" href="#">English</a>
    <a @click.prevent="setLocale('uz')" class="px-3 py-1 hover:text-gray-500" href="#">Uzbek</a>
    <a @click.prevent="setLocale('rus')" class="px-3 py-1 hover:text-gray-500" href="#">Russian</a>
  </div>
  </div>
</div>
</template>

<script>
export default {
data(){
    return {
        show: false,
        langs: ['en', 'uz', 'rus']
    }
},
methods: {
    setLocale(locale) {
        this.$i18n.locale = locale;
        this.$router.push({
            params: { lang : locale }
        })
        this.show = false
    }
}
}
</script>

<style>

</style>