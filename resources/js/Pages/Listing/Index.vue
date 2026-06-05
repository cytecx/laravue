<template>
    <Filters :filters="filters" />
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Listing v-for="(item, index) in listings.data" :key="item.id" :listing="item" />
    </div>

    <div v-if="listings.data.length" class="w-full flex just justify-center mt-4 mb-4">
        <Pagination :links="listings.links" />
    </div>
    <div v-else class="w-full text-center mt-4 mb-4">
        <p class="text-gray-500">No listings found.</p>
    </div>
</template>

<script setup>
import Pagination from "@/Components/UI/Pagination.vue";
import Listing from "@/Pages/Listing/Index/Components/Listing.vue";
import Filters from "@/Pages/Listing/Index/Components/Filters.vue";
defineProps({
    listings: Object,
    filters: Object,
})
</script>
