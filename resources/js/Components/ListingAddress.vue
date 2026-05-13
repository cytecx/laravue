<template>
    <div>{{ listing.street }} {{ listing.street_nr }}, {{ listing.city }} for RM {{ listing.price }}</div>
</template>


<script setup>
defineProps({
    listing: Object
})
</script>
