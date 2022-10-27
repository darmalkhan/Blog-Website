<template>
  <div v-if="this.page.flash.success" 
  class="fixed bottom-4 right-4 flex items-center text-white rounded px-8 py-4 bg-green-500">
      {{ this.page.flash.success }}
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>