<template>
<div>

    <dev :class="{
        'space-y-8 sm:space-y-16': isList,
        'grid sm:grid-cols-3 sm:gap-12': isGrid,
    }">
        <Article :layout="layout" v-for="article in articles" :key="article.id" :article="article" />
    </dev>

    <div v-if="showViewAll" class="mt-8 sm:mt-12">
        <router-link :to="`/${$i18n.locale}/articles`" tag="button" class="px-4 py-2 bg-blue-400 hover:shadow-inner transform hover:scale-95 hover:bg-opacity-50 transition ease-in duration-700 rounded text-white cursor-pointer tracking-wider focus:outline-none">
            {{ $t('general.View All') }}
        </router-link>
    </div>
    

</div>
</template>

<script>
import Article from '@/components/Article';
import { computed } from '@vue/runtime-core';
export default {

components: {
    Article
  },

props: {
    layout:{
        type: String,
        default: "list"
    },
    showViewAll: {
        type: Boolean,
        default: true,
    },
    articles: Array
},

setup(props){

    let isGrid = computed(() => {
        return props.layout === 'grid';
    });


    let isList = computed(() => {
        return props.layout === 'list';
    });

    return {
        isGrid,
        isList
    }

}

}
</script>


<style>

</style>