<template>
    <div>
        <Filter />
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <Listing :user="user" v-for="listing in paginatedListings.data" :key="listing.id" :listing="listing"/>
        </div>
        <Pagination :links="paginatedListings"/>
    </div>
</template>
<script setup>
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import Listing from '@/Pages/Listing/Index/Components/Listing.vue'
import Pagination from '@/Components/UI/Pagination.vue'
import Filter from '@/Pages/Listing/Index/Components/Filter.vue'
const user = computed(() => usePage().props.user)
defineProps({
  paginatedListings: Object
})
</script>
