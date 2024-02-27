<template>
    <div>
        <h1>Listing</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <Listing :user="user" v-for="listing in listings" :key="listing.id" :listing="listing"/>
        </div>
    </div>
</template>
<script setup>
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import Listing from '@/Pages/Listing/Index/Components/Listing.vue'
const user = computed(() => usePage().props.user)
defineProps({
  listings: Object
})
</script>
