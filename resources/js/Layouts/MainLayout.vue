<template>
    <Link href="/">Main Page</Link>
    <br>
    <Link href="/hello">Show Page</Link>

    <br>
    <p>The page with time {{ timer }}</p>

    <slot></slot>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const timer = ref(0);
setInterval(() => timer.value++, 1000);
</script>
