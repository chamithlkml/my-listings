<template>
  <Box>
    <div class="flex items-center gap-1">
        <Price :price="listing.price" class="text-2xl font-bold"/>
        <div class="text-xs text-gray-500">
            <Price :price="monthlyPayment"/> pm
        </div>
    </div>
    <ListingSpace :listing="listing" class="text-lg" />
    <ListingDetails :listing="listing" class="text-gray-500"/>
    <br/>
    <Link :href="route('listings.show', {listing: listing.id})">View</Link>
    &nbsp;
    <Link v-if="user" :href="route('listings.edit', {listing: listing.id})">Edit</Link>
    &nbsp;
    <Link v-if="user" :href="route('listings.destroy', {listing: listing.id})" method="DELETE">Delete</Link>
    <hr/>
  </Box>
</template>
<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import ListingDetails from '@/Components/ListingDetails.vue'
import Box from '@/Components/UI/Box.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import Price from '@/Components/UI/Price.vue'
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment'
const props = defineProps({
  listing: Object
})
const user = computed(() => usePage().props.user)
const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25)
</script>
