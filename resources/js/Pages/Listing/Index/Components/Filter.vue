<template>
  <div class="flex">
    <form>
      <input type="number" id="priceFrom" class="rounded-l-md border-inherit mb-4 w-32 placeholder:text-center" placeholder="Price From" />
      <input type="number" id="priceTo" class="rounded-r-md border-inherit mb-4 w-32 placeholder:text-center" placeholder="Price To" />
      <select id="beds" name="beds" class="rounded-md border-inherit ml-2">
        <option :value="null">Beds</option>
        <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
      </select>
      <select id="baths" name="baths" class="rounded-md border-inherit ml-2">
        <option :value="null">Baths</option>
        <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
      </select>
      <input type="number" id="areaFrom" class="rounded-l-md border-inherit ml-2 mb-4 w-32 placeholder:text-center" placeholder="Area From" />
      <input type="number" id="areaTo" class="rounded-r-md border-inherit mb-4 w-32 placeholder:text-center" placeholder="Area To" />
      <button class="btn-primary mx-2" type="submit">Search</button>
    </form>
  </div>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  beds: null,
  baths: null,
  area: null,
  city: null,
  price: null
})

const search = () => {
  form.get('/listings')
}
</script>
