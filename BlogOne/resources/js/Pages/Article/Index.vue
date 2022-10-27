<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Articles
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <jet-button :href="route('articles.create')">Add new</jet-button>
                <div class="mt-4 bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <AppTable :headers="headers" :items="articles">
                         <tr v-for="article in articles.data" :key="article.id">
                           <td>{{ article.title }}</td>
                           <td>{{ article.category.name }}</td>
                           <td>{{ article.created_at_for_human }}</td>
                           <td>
                               <div class="flex items-center justify-end space-x-2">
                                   <edit-btn :url="route('articles.edit', {article: article.id})"/>
                                   <delete-btn :url="route('articles.destroy', {article: article.id})"  module-name="article"/>
                               </div>
                           </td>
                       </tr>

                    </AppTable>

                   <div v-if="articles.data.length > 0" class="mt-4">
                       <SimplePaginate :prev-url="articles.links.prev" :next-url="articles.links.next"/>
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
            articles: {}
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
                        name: 'Title'
                    },
                    {
                        name: 'Category'
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
