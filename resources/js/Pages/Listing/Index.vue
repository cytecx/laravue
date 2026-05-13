<template>
    <div>
        <h1>Listings</h1>
        <ul>
            <li v-for="(item, index) in listing" :key="item.id">
                <div>
                    <Link :href="route('listing.show', item.id)">
                        <ListingAddress :listing="item" />
                    </Link>
                </div>
                <div>
                    <Link :href="route('listing.edit', item.id)">Edit</Link>
                </div>
                <div>
                    <Link :href="route('listing.destroy', item.id)" method="delete" as="button">Delete</Link>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import ListingAddress from "@/Components/ListingAddress.vue";
defineProps({
    listing: Array
})
</script>
