<template>

<innerPage :image-url="article.image_url" :title="article.title"  height="articleDetail" />


  <div class="container mx-auto px-4 sm:px-0 py-8 sm:py-12">
   <div class="flex flex-col sm:flex-row sm:items-center justify-between">

       <div class="flex items-center text-gray-700">
           <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            </div>
           <div class="ml-1">{{ article.category.name }}</div>
       </div>

       <div class="mt-2 sm:mt-0 text-sm flex items-center text-gray-700">
           <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            </div>
           <div class="ml-1">{{ article.created_date }}</div>
       </div>
   </div>

   <div class="mt-4 sm:mt-16" v-html="article.description"></div>
  </div>
</template>

<script>
import innerPage from '@/components/innerPage';
import { useArticle } from '@/composables/useArticle.js'

export default {

    components: {
        innerPage,
    },

    props: {
        slug: String,

    },

    setup(props) {
    let { articleDetail, articleDetailLoading, fetchArticleDetail } = useArticle();

    fetchArticleDetail({
        slug: props.slug
    })

    return {
        article: articleDetail,
        loading: articleDetailLoading
    }
    }

}
</script>