<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <inertia-link :href="route('articles.index')">Articles</inertia-link>
                <span class="mx-2">&gt;</span>
                <span class="text-gray-500">
                    <span v-if="edit">Edit Article</span>
                    <span v-else>Add Article</span>
                </span>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <form @submit.prevent="saveArticle">
                        <!-- image -->
                        <AppImage class="mt-2"
                        :image-url="imageUrl"
                        label="Image"
                        v-model="form.image"
                         :error-message="form.errors.image" />


                        <div class="mt-4">
                            <jet-label for="category" value="Category" />
                            <select name="category" id="category" class="mt-2 black w-full form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" v-model="form.category_id">
                                <option value="">Select</option>
                                <option :value="category.id" v-for="category in categories.data" :key="category.id">{{ category.name }}</option>
                            </select>
                        <jet-input-error :message="form.errors.category_id" class="mt-2" />
                        </div>

                      <!-- title -->
                    <div class="mt-4 col-span-6 sm:col-span-6">
                        <jet-label for="title" value="Title" />
                        <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="title" />
                        <jet-input-error :message="form.errors.title" class="mt-2" />
                    </div>

                       <!-- slug -->
                    <div class="mt-4 col-span-6 sm:col-span-6">
                        <jet-label for="slug" value="Slug" />
                        <jet-input id="slug" type="text" class="mt-1 block w-full" v-model="form.slug" autocomplete="slug" />
                        <jet-input-error :message="form.errors.slug" class="mt-2" />
                    </div>

                     <!-- Description -->
                    <div class="col-span-6 sm:col-span-6">
                        <jet-label for="description" value="Description" />
                        <AppCKeditor class="mt-1" v-model="form.description"></AppCKeditor>
                        <jet-input-error :message="form.errors.description" class="mt-2" />
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
    import AppImage from '@/Components/Image'
    import AppCKeditor from '@/Components/CKeditor'






    export default {

        components: {
            AppLayout,
            JetButton,
            JetInput,
            JetInputError,
            JetLabel,
            JetActionMessage,
            AppCKeditor,
            AppImage,
        },
        props: {
            edit: Boolean,
            article: Object,
            categories: {
                type:Object,
                default: function() {
                    return {
                        data: []
                    }
                }
            }
        },

        data() {
            return {
                imageUrl: "",
                form: this.$inertia.form({
                    "_method": this.edit ? 'PUT' : "",
                    category_id: "",
                    title: "",
                    slug: "",
                    description: this.edit ? this.article.data.description : "",
                    image: ""
                },
                {
                    resetOnSuccess: false,
                }
                )
            }
        },
        methods: {
            saveArticle() {
                this.edit
                ? this.form.post(route('articles.update', {id: this.article.data.id}))
                : this.form.post(route('articles.store'))
            }
        },
        watch: {
            "form.title"(title) {
                this.form.slug = strSlug(title);
            }
        },
        mounted() {
            if(this.edit){
                this.form.category_id = this.article.data.category_id;
                this.form.title = this.article.data.title;
                this.form.slug = this.article.data.slug;
            }
                this.imageUrl = this.article.data.image_url;
        }
    }
</script>
