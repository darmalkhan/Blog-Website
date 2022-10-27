<template>
    <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" rows="5"
    :value="modelValue" @input="$emit('update:modelValue', $event.target.value)"></textarea>
</template>

<script>
    export default {
        props: ['modelValue'],

        emits: ['update:modelValue'],
    }
</script>

