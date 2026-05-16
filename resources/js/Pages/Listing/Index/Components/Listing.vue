<template>
    <Box>
        <div>
            <div class="flex items-center gap-1">
                <Link :href="route('listing.show', listing.id)">
                    <Price :price="listing.price" class="text-2xl font-bold text-indigo-600 dark:text-indigo-300 mb-2" />
                </Link>
                <div class="text-xs text-gray-500">
                    <Price :price="monthlyPayment" /> / month
                </div>
            </div>
            <ListingSpace :listing="listing" class="text-lg" />
            <ListingAddress :listing="listing" class="text-gray-600" />
        </div>
        <div class="mt-4 flex justify-between gap-2">
            <Link :href="route('listing.edit', listing.id)" class="px-3 py-1 cursor-pointer bg-blue-600 text-white rounded hover:bg-blue-700 transition">Edit</Link>
            <Link :href="route('listing.destroy', listing.id)" method="delete" as="button" class="px-3 py-1 cursor-pointer bg-red-600 text-white rounded hover:bg-red-700 transition">Delete</Link>
        </div>
    </Box>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import ListingAddress from "@/Components/ListingAddress.vue";
import Box from "@/Components/UI/Box.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Price from "@/Components/Price.vue";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment"

const props = defineProps({
    listing: Object
})

const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 35)

</script>
