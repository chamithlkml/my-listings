<template>
  <div class="flex">
    <form @submit.prevent="filter">
      <input v-model="filterForm.priceFrom" type="number" id="priceFrom" class="rounded-l-md border-inherit mb-4 w-32 placeholder:text-center" placeholder="Price From" />
      <input v-model="filterForm.priceTo" type="number" id="priceTo" class="rounded-r-md border-inherit mb-4 w-32 placeholder:text-center" placeholder="Price To" />
      <select v-model="filterForm.beds" id="beds" name="beds" class="rounded-md border-inherit ml-2">
        <option :value="null">Beds</option>
        <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
      </select>
      <select v-model="filterForm.baths" id="baths" name="baths" class="rounded-md border-inherit ml-2">
        <option :value="null">Baths</option>
        <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
      </select>
      <input v-model="filterForm.areaFrom" type="number" id="areaFrom" class="rounded-l-md border-inherit ml-2 mb-4 w-32 placeholder:text-center" placeholder="Area From" />
      <input v-model="filterForm.areaTo" type="number" id="areaTo" class="rounded-r-md border-inherit mb-4 w-32 placeholder:text-center" placeholder="Area To" />
      <button class="btn-primary mx-2" type="submit">Search</button>
      <button @click="clear" class="btn-secondary mx-2" type="clear">Clear</button>
    </form>
  </div>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  filters: Object
})

const filterForm = useForm({
  priceFrom: props.filters.priceFrom,
  priceTo: props.filters.priceTo,
  beds: props.filters.beds ?? null,
  baths: props.filters.baths ?? null,
  areaFrom: props.filters.areaFrom,
  areaTo: props.filters.areaTo
})

const filter = () => {
  filterForm.get('/listings', {
    preserveState: true,
    preserveScroll: true
  })
}

const clear = () => {
  filterForm.priceFrom = null
  filterForm.priceTo = null
  filterForm.beds = null
  filterForm.baths = null
  filterForm.areaFrom = null
  filterForm.areaTo = null
}
</script>
