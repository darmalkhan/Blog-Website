<template>
  <router-link class="block sm:inline-block sm:px-4 py-2 hover:text-blue-400 transition-colors duration-300" :to="to">
 {{ label }}
  </router-link>
</template>

<script>
export default {
    props: {
        to: {
            type: String,
            required: true,
        },
          label: {
            type: String,
            required: true,
        }
    }

}
</script>