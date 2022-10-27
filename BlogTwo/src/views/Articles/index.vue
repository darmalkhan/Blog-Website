<template>

<innerPage image-url="/images/background-business-computer-connection.jpg" :title="$t('title.Articles Us')"/>


  <div class="container mx-auto px-4 sm:px-0 py-8 sm:py-12">
    <Articles layout="grid" :show-view-all="false" :articles="articles.data"/>

    <div class="mt-8 sm:mt-12">
      <button class="px-4 py-2 bg-blue-400 hover:shadow-inner transform hover:scale-95 hover:bg-opacity-50 transition ease-in duration-700 rounded text-white cursor-pointer tracking-wider focus:outline-none" 
      @click="showMoreArticles" 
      v-if="articles.links.next!==null">
        <span v-if="loading">{{ $t('general.Loading') }}</span>
        <span v-else>{{ $t('general.View More') }}</span>
      </button>
    </div>
  </div>
</template>

<script>
import innerPage from '@/components/innerPage';
import Articles from '@/components/Articles';
import { useArticle } from '@/composables/useArticle.js'

export default {

    components: {

        innerPage,
        Articles
    },
      setup() {
    // let { articles, loading, fetchArticles } = useArticle();

    let { fetchArticles, loading, articles } = useArticle();

    fetchArticles();
    
    function showMoreArticles(){
      fetchArticles({
        showMore: true,
        page: articles.value.meta.current_page + 1
      })
    }
    return { articles,loading , showMoreArticles };
  }

}
</script>