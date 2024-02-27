<template>
  <div>
    <span>{{ listing.code }}, {{ listing.city }}, {{ listing.street }}, {{ listing.street_nr }}</span>
  </div>
</template>
<script setup>
defineProps({
  listing: Object
})
</script>
