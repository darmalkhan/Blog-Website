<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <inertia-link :href="route('categories.index')">Categories</inertia-link>
                <span class="mx-2">&gt;</span>
                <span class="text-gray-500">
                    <span v-if="edit">Edit Category</span>
                    <span v-else>Add Category</span>
                </span>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <form @submit.prevent="saveCategory">
                      <!-- name -->
                    <div class="col-span-6 sm:col-span-6">
                        <jet-label for="name" value="Name" />
                        <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                        <jet-input-error :message="form.errors.name" class="mt-2" />
                    </div>

                       <!-- slug -->
                    <div class="mt-4 col-span-6 sm:col-span-6">
                        <jet-label for="slug" value="Slug" />
                        <jet-input id="slug" type="text" class="mt-1 block w-full" v-model="form.slug" autocomplete="slug" />
                        <jet-input-error :message="form.errors.slug" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                        <span v-if="edit">Update.</span>
                        <span v-else>Save.</span>
                    </jet-action-message>

                    <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        
                        <span v-if="edit">Update</span>
                        <span v-else>Save</span>
                    </jet-button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template> 

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import { strSlug } from '@/helpers.js';




    export default {

        components: {
            AppLayout,
            JetButton,
            JetInput,
            JetInputError,
            JetLabel,
            JetActionMessage
        },
        props: {
            edit: Boolean,
            category: Object,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: "",
                    slug: "",
                })
            }
        },
        methods: {
            saveCategory() {
                this.edit
                ? this.form.put(route('categories.update', {id: this.category.data.id}))
                : this.form.post(route('categories.store'))
            }
        },
        watch: {
            "form.name"(name) {
                this.form.slug = strSlug(name);
            }
        },
        mounted() {
            if(this.edit){
                this.form.name = this.category.data.name
                this.form.slug = this.category.data.slug
            }
        }
    }
</script>
