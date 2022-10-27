<template>
   <div class="flex items-center justify-between">
        <jet-button 
        :href="prevUrl" 
        :disabled="!prevUrl"
        :class="{'opacity-50': !prevUrl}"
        >Previous</jet-button>
        <jet-button 
        :href="nextUrl" 
        :disabled="!nextUrl"
        :class="{'opacity-50': !nextUrl}"
        >Next</jet-button>
    </div>
</template>

<script>
import JetButton from '@/Jetstream/Button'
export default {
    components: {
        JetButton
    },
    props: {
        prevUrl: {},
        nextUrl: {}

    }
}
</script>

<style>

</style>