<template>
  <div>You need to be verify your email address before you can access this page.</div>

  <div>
    <Link :href="route('verification.send')" as="button" method="post" class="text-indigo-600 dark:text-indigo-400">Resend Verification Email</Link>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

</script>