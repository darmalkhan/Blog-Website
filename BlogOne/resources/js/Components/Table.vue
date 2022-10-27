<template>
    <table>
        <thead>
            <tr>
                <th v-for="(header, index) in headers" :key="`header-${index}`" :class="header.class || 'text-left'">{{ header.name }}</th>
            </tr>
        </thead>
        <tbody>
         <slot></slot>
        <tr v-if="items.data.length === 0" >
            <td class="p-4" :aria-colspan="headers.length">
                No data available                           
            </td>                       
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: {
        headers: {
            type: Array,
            required: true,
        },
         items: {
            type: Object,
            required: true,
        }
    }

}
</script>

<style>

</style>