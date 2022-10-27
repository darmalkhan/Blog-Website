<template>
  <footer class="text-center py-6 sm:py-12 bg-blue-900 text-white text-base">
      <div class="container mx-auto px-4 sm:px-0">
          <span v-html="$t('general.Copy Right')"></span>

          <div>
              <span>{{ $t('general.Made by') }}</span>
              <span class="ml-1 font-bold"> 
                  <span>IXIS</span>
                  <span class="text-red-500">CYBER</span>
              </span>
          </div>
      </div>

  </footer>
</template>

<script>
export default {

}
</script>

<style>

</style>