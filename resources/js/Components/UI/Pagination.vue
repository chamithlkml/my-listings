<template>
  <nav aria-label="Page navigation example" class="mt-4 text-center">
    <ul class="inline-flex -space-x-px text-base h-10">
    <li>
        <Link :href="links.prev_page_url" class="paginate-previous">Previous</Link>
    </li>
    <li>
        <Link :href="links.first_page_url" class="paginate-button">First Page</Link>
    </li>
    <li>
        <Link aria-current="page" class="paginate-button-active">{{ links.current_page }}</Link>
    </li>
    <li>
        <Link :href="links.last_page_url" class="paginate-button">Last Page</Link>
    </li>
    <li>
        <Link :href="links.next_page_url" class="paginate-next">Next</Link>
    </li>
    </ul>
</nav>
</template>
<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({
  links: Object
})
</script>
