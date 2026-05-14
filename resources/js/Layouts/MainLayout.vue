<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold">
                    <Link :href="route('listing.index')">LaraZillow v2</Link>
                </div>
                <div class="text-lg">
                    <Link :href="route('listing.create')" class="btn-primary">+ New Listing</Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto py-4 w-full">
        <div>
            <p v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">yesss</p>
        </div>

        <slot></slot>
    </main>

</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from "vue";

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
</script>
