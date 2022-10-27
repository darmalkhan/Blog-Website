<template>

<innerPage :image-url="settings.about_image_url" :title="$t('title.About Us')" />


  <div class="container mx-auto px-4 sm:px-0 py-8 sm:py-12">
    <p class="mt-4">{{ $t('general.About Us description') }}</p>
    <p class="mt-4">{{ $t('general.About Us description') }}</p>
    <p class="mt-4">{{ $t('general.About Us description') }}</p>
    <p class="mt-4">{{ $t('general.About Us description') }}</p>
    <p class="mt-4">{{ $t('general.About Us description') }}</p>
    <p class="mt-4">{{ $t('general.About Us description') }}</p>
    <p class="mt-4">{{ $t('general.About Us description') }}</p>
    </div>
</template>

<script>
import innerPage from '@/components/innerPage';
import { useSettings } from '@/composables/useSetting.js'

export default {

    components: {
        innerPage,
    },

    setup() {
    let { settings } = useSettings();

    return {
          settings,
    }
  }

}
</script>