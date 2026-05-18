<template>

  <div class="mb-4">
    <Link :href="route('realtor.listing.index')">← Go back to Listings</Link>
  </div>

  <Box>
    <template #header>
      <h1>Upload New Images</h1>
    </template>
    <form @submit.prevent="upload">
      <section class="flex items-center gap-2 my-4">
        <input class="border rounded-md cursor-pointer file:px-4 file:py-2 border-gray-200 dark:border-gray-700 file:text-gray-700 file:dark:text-gray-400 file:border-0 file:bg-gray-100 file:dark:bg-gray-800 file:font-medium file:hover:bg-gray-200 file:dark:hover:bg-gray-700 file:hover:cursor-pointer file:mr-4" type="file" multiple @input="addFiles" />
        <button type="submit" class="btn-outline disabled:opacity-25 disabled:cursor-not-allowed" :disabled="!canUpload">Upload</button>
        <button type="reset" class="btn-outline cursor-pointer" @click="reset">Reset</button>
      </section>

      <div v-if="imageErrors.length">
        <ul class="text-red-500">
          <li v-for="(error, index) in imageErrors" :key="index">{{ error }}</li>
        </ul>
      </div>
    </form>
  </Box>

  <Box v-if="props.listing.images.length" class="mt-6">
    <template #header>Current Listing Images</template>
    <section class="mt-4 grid grid-cols-3 gap-4">
      <div v-for="image in props.listing.images" :key="image.id" class="flex flex-col justify-space-between">
        <img :src="image.src" :alt="image.filename" class="rounded-md" />
        <Link :href="route('realtor.listing.image.destroy', [props.listing.id, image.id])" method="delete" class="btn-outline text-xs font-medium mt-2 text-center cursor-pointer">Delete</Link>
      </div>
    </section>
  </Box>
</template>

<script setup>
import Box from "@/Components/UI/Box.vue";
import { useForm, router, Link } from "@inertiajs/vue3";
import { computed } from "vue";
import NProgress from "nprogress";

const props = defineProps({
  listing: Object,
});

const form = useForm({
  images: [],
});

const addFiles = (event) => {
  form.images = event.target.files;
};

const imageErrors = computed(() => Object.values(form.errors));

const canUpload = computed(() => form.images.length > 0);

const upload = () => {
  form.post(
    route('realtor.listing.image.store', props.listing.id),
    {
      forceFormData: true,
      preserveScroll: true,
      onStart: () => {
        NProgress.start();
      },
      onProgress: (event) => {
        const percentage = event?.detail?.progress?.percentage ?? event?.progress?.percentage ?? (event && event.loaded && event.total ? Math.round((event.loaded / event.total) * 100) : null);

        if (percentage !== null && typeof percentage !== 'undefined') {
          NProgress.set((percentage / 100) * 0.9);
        }
      },
      onFinish: () => {
        NProgress.done();
      },
      onError: () => {
        NProgress.done();
      },
      onSuccess: () => {
        reset();
      }
    },
  );
};

const reset = () => form.reset('images');

</script>