<template>
    <span>{{ formattedPrice }}</span>
</template>

<script setup>
import { computed } from "vue";
const props = defineProps({
    price: [Number, String]
})
const formattedPrice = computed(() =>
    Number(props.price).toLocaleString('en-MY', {
        style: 'currency',
        currency: 'MYR',
        minimumFractionDigits: 0,
    })
)
</script>
