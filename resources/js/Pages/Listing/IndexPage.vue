<template>
    <div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <Listing :user="user" v-for="listing in listings" :key="listing.id" :listing="listing"/>
        </div>
        <nav aria-label="Page navigation example" class="mt-4 text-center">
            <ul class="inline-flex -space-x-px text-base h-10">
            <li>
                <Link :href="props.paginatedListings.prev_page_url" class="paginate-previous">Previous</Link>
            </li>
            <li>
                <Link :href="props.paginatedListings.first_page_url" class="paginate-button">First Page</Link>
            </li>
            <li>
                <Link aria-current="page" class="paginate-button-active">{{ props.paginatedListings.current_page }}</Link>
            </li>
            <li>
                <Link :href="props.paginatedListings.last_page_url" class="paginate-button">Last Page</Link>
            </li>
            <li>
                <Link :href="props.paginatedListings.next_page_url" class="paginate-next">Next</Link>
            </li>
            </ul>
        </nav>
    </div>
</template>
<script setup>
import { usePage, Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import Listing from '@/Pages/Listing/Index/Components/Listing.vue'
const user = computed(() => usePage().props.user)
const props = defineProps({
  paginatedListings: Object
})
const listings = props.paginatedListings.data
console.log(props.paginatedListings.next_page_url)
</script>
