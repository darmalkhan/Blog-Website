<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <jet-button :href="route('categories.create')">Add new</jet-button>
                <div class="mt-4 bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <AppTable :headers="headers" :items="categories">
                         <tr v-for="category in categories.data" :key="category.id">
                           <td>{{ category.name }}</td>
                           <td>{{ category.created_at_for_human }}</td>
                           <td>
                               <div class="flex items-center justify-end space-x-2">
                                   <edit-btn :url="route('categories.edit', {category: category.id})"/>
                                   <delete-btn :url="route('categories.destroy', {category: category.id})"  module-name="category"/>
                               </div>
                           </td>
                       </tr>
                    </AppTable>

                   <div v-if="categories.data.length > 0" class="mt-4">
                       <SimplePaginate :prev-url="categories.links.prev" :next-url="categories.links.next"/>
                   </div>
                </div>
            </div>
        </div>
    </app-layout>
</template> 

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import EditBtn from '../../Components/EditBtn.vue'
    import DeleteBtn from '../../Components/DeleteBtn.vue'
    // import Welcome from '@/Jetstream/Welcome'
     import JetButton from '@/Jetstream/Button'
     import SimplePaginate from '@/Components/SimplePaginate'
     import AppTable from '@/Components/Table'


    export default {
        props: {
            categories: {}
        },
        components: {
            AppLayout,
            EditBtn,
            DeleteBtn,
            JetButton,
            SimplePaginate,
            // Welcome,
            AppTable
        },
        computed: {
            headers() {
                return [
                    {
                        name: 'Name'
                    },
                    {
                        name: 'Created Date'
                    },
                    {
                        name: 'Action',
                        class: 'text-right',
                    }
                ]
            }
        }
    }
</script>
