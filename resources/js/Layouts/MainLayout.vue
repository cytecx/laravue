<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold">
                    <Link :href="route('home')">{{ appName }}</Link>
                </div>
                <div v-if="user" class="flex items-center gap-4">
                    <Link :href="route('notification.index')" class="text-gray-500 relative pr-2 py-2 text-lg hover:text-gray-700 dark:hover:text-gray-300 cursor-pointer">
                        🔔
                        <div v-if="notificationCount" class="absolute right-0 top-0 w-5 h-5 bg-red-700 dark:bg-red-400 text-white font-medium border border-white dark:border-gray-900 rounded-full text-xs text-center">{{ notificationCount }}</div>
                    </Link>
                    <Link :href="route('realtor.listing.index')" class="text-sm text-gray-500">{{ user.name }}</Link>
                    <Link :href="route('realtor.listing.create')" class="btn-primary">+ New Listing</Link>
                    <Link :href="route('logout')" method="delete" class="cursor-pointer btn-secondary">Logout</Link>
                </div>
                <div v-else class="flex items-center gap-2">
                    <Link :href="route('user-account.create')" class="btn-secondary">Register</Link>|
                    <Link :href="route('login')" class="cursor-pointer">Sign-In</Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto py-4 w-full">
        <div>
            <p v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">{{ flashSuccess }}</p>
            <p v-if="flashError" class="mb-4 border rounded-md shadow-sm border-red-200 dark:border-red-800 bg-red-50 dark:bg-red-900 p-2">{{ flashError }}</p>
        </div>

        <slot></slot>
    </main>

</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from "vue";

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
const flashError = computed(() => page.props.flash.error);
const user = computed(() => page.props.user);
const appName = computed(() => page.props.appName || "");
const notificationCount = computed(() => Math.min(page.props.user?.notificationCount, 9))
</script>
