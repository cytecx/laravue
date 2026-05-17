<template>
    <div class="flex flex-col gap-4">
        <Box>
            <template #header>
                Welcome to Laravue
            </template>
            <div class="text-gray-600 dark:text-gray-400">
                Your application is running smoothly.
            </div>
            
            <div v-if="message" class="mt-4 p-4 rounded-md shadow-sm border border-blue-200 dark:border-blue-800 bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-300">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">
                            {{ message }}
                        </p>
                    </div>
                </div>
            </div>
        </Box>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <Box>
                <template #header>
                    System Status
                </template>
                <ul class="space-y-2">
                    <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> Database Connected
                    </li>
                    <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> Cache Optimal
                    </li>
                    <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> Workers Active
                    </li>
                </ul>
            </Box>
            
            <Box>
                <template #header>
                    Tech Stack & References
                </template>
                <ul class="space-y-2">
                    <li>
                        <a href="https://laravel.com/docs/13.x" target="_blank" rel="noopener noreferrer" class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 flex items-center">
                            Laravel 13.x Documentation
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://vuejs.org/guide/introduction.html" target="_blank" rel="noopener noreferrer" class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 flex items-center">
                            Vue 3 Documentation
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://inertiajs.com/" target="_blank" rel="noopener noreferrer" class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 flex items-center">
                            Inertia.js Documentation
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://tailwindcss.com/docs" target="_blank" rel="noopener noreferrer" class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 flex items-center">
                            Tailwind CSS v4 Documentation
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    </li>
                </ul>
            </Box>
        </div>
    </div>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue';

defineProps({
    message: String
})
</script>
