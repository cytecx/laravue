<template>
    <form @submit.prevent="update">
        <div>
            <div>
                <label>Beds</label>
                <input type="text" v-model.number="form.beds" style="border: 1px solid #ccc;" />
                <div v-if="form.errors.beds" class="error">{{ form.errors.beds }}</div>
            </div>

            <div>
                <label>Baths</label>
                <input type="text" v-model.number="form.baths" style="border: 1px solid #ccc;" />
                <div v-if="form.errors.baths" class="error">{{ form.errors.baths }}</div>
            </div>

            <div>
                <label>Area</label>
                <input type="text" v-model.number="form.area" style="border: 1px solid #ccc;" />
                <div v-if="form.errors.area" class="error">{{ form.errors.area }}</div>
            </div>

            <div>
                <label>City</label>
                <input type="text" v-model="form.city" style="border: 1px solid #ccc;" />
                <div v-if="form.errors.city" class="error">{{ form.errors.city }}</div>
            </div>

            <div>
                <label>Post Code</label>
                <input type="text" v-model="form.post_code" style="border: 1px solid #ccc;" />
                <div v-if="form.errors.post_code" class="error">{{ form.errors.post_code }}</div>
            </div>

            <div>
                <label>Street</label>
                <input type="text" v-model="form.street" style="border: 1px solid #ccc;" />
                <div v-if="form.errors.street" class="error">{{ form.errors.street }}</div>
            </div>

            <div>
                <label>Street Nr</label>
                <input type="text" v-model.number="form.street_nr" style="border: 1px solid #ccc;" />
                <div v-if="form.errors.street_nr" class="error">{{ form.errors.street_nr }}</div>
            </div>

            <div>
                <label>Price</label>
                <input type="text" v-model.number="form.price" style="border: 1px solid #ccc;" />
                <div v-if="form.errors.price" class="error">{{ form.errors.price }}</div>
            </div>

            <div>
                <button type="submit" style="border: 1px solid black;">Edit</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    listing: Object,
});

const form = useForm({
    beds: props.listing.beds,
    baths: props.listing.baths,
    area: props.listing.area,
    city: props.listing.city,
    post_code: props.listing.post_code,
    street: props.listing.street,
    street_nr: props.listing.street_nr,
    price: props.listing.price,
});

const update = async () => {
    form.put(route('listing.update', props.listing.id), {
        onSuccess: () => form.reset(),
    });
};

</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px
}
</style>
