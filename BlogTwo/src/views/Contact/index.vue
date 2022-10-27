<template>

<innerPage :image-url="settings.contact_image_url" :title="$t('title.Contact Us')" />

  <div class="container mx-auto px-4 sm:px-0 py-8 sm:py-12">
      <div class="grid sm:grid-cols-3 sm:gap-4">
         <div> <span class="text-gray-500">{{ $t('general.Address') }}: </span>{{ settings.address }}</div>
         <div> <span class="text-gray-500">{{ $t('general.Phone') }}: </span>{{ settings.phone }}</div>
         <div> <span class="text-gray-500">{{ $t('general.Email') }}: </span>{{ settings.email }}</div>
      </div>

      <div class="mt-8 sm:mt-16 grid sm:grid-cols-2 gap-8 sm:gap-12"> 
          <div>
              <iframe 
              :src="settings.google_map_url" 
              class="w-full" 
              height="450" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy"></iframe>
          </div>
          <form @submit.prevent="sendFeedback" class="p-8 bg-gray-300 shadow rounded space-y-4">
              <div>
                  <input type="text"
                  :placeholder="$t('general.Enter Name')"
                  v-model="form.name"
                  class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded bg-gray-200"
                  required>
                  <span class="text-red-500 text-sm">{{ getError('name')}}</span>
              </div>

              <div>
                  <input type="email"
                  :placeholder="$t('general.Enter Email')"
                  v-model="form.email"
                  class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded bg-gray-200"
                  required>
                  <span class="text-red-500 text-sm">{{ getError('email')}}</span>
              </div>

               <div>
                  <input type="phone"
                  :placeholder="$t('general.Phone Number')"
                  v-model="form.phone"
                  class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded bg-gray-200"
                  required>
                  <span class="text-red-500 text-sm">{{ getError('phone')}}</span>
              </div>

              <div>
                  <textarea  v-model="form.message" 
                  :placeholder="$t('general.Enter Message')"
                  class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded bg-gray-200" 
                  rows="5"
                  ></textarea>
                  <span class="text-red-500 text-sm">{{ getError('message')}}</span>

              </div>

              <div class="px-4 py-2 bg-green-600 text-white rounded" v-if="SuccessMessage">
                 {{ $t('general.Your message has submitted successfully,') }}
              </div>

              <!-- <div class="px-4 py-2 bg-red-600 text-white rounded">
                  Lorem ipsum dolor sit amet consectetur.
              </div> -->

              <button 
              class="px-4 py-2 sm:px-6 bg-blue-400 text-white rounded focus:outline-none" 
              :class="{'opacity-50': loading }"
              :disabled="loading"
              >
              <span v-if="loading">{{ $t('general.Submitting') }}</span>
              <span v-else>{{ $t('general.Submit') }}</span>
              
              </button>
          </form>
      </div>
  </div>
</template>

<script>
import innerPage from '@/components/innerPage';
import { useSettings } from '@/composables/useSetting.js'
import { useContact } from '@/composables/useContact.js'

export default {

    components: {
        innerPage,
    },

    setup() {
    let { settings } = useSettings();

    let {
        form,
        loading,
        sendFeedback,
        SuccessMessage,
        getError,
        } = useContact();

    return {
          settings,
          form,
          loading,
          sendFeedback,
          SuccessMessage,
          getError

    };
  },
};
</script>