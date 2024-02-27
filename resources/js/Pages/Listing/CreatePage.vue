<template>
  <div>
    <h1>Create</h1>
    <form @submit.prevent="submit">
      <div class="grid grid-cols-6 gap-4">
        <div class="col-span-2">
          <label class="label" for="beds">Beds</label>
          <input type="number" id="beds" v-model="form.beds" class="input">
          <div v-if="form.errors.beds" class="input-error">{{ form.errors.beds }}</div>
        </div>
        <div class="col-span-2">
          <label class="label" for="baths">Baths</label>
          <input type="number" id="baths" v-model="form.baths" class="input">
          <div v-if="form.errors.baths" class="input-error">{{ form.errors.baths }}</div>
        </div>
        <div class="col-span-2">
          <label class="label" for="area">Area</label>
          <input type="number" id="area" v-model="form.area" class="input">
          <div v-if="form.errors.area" class="input-error">{{ form.errors.area }}</div>
        </div>
        <div class="col-span-2">
          <label class="label" for="city">City</label>
          <input type="text" id="city" v-model="form.city" class="input">
          <div v-if="form.errors.city" class="input-error">{{ form.errors.city }}</div>
        </div>
        <div class="col-span-2">
          <label class="label" for="code">Code</label>
          <input type="text" id="code" v-model="form.code" class="input">
          <div v-if="form.errors.code" class="input-error">{{ form.errors.code }}</div>
        </div>
        <div class="col-span-2">
          <label class="label" for="street">Street</label>
          <input type="text" id="street" v-model="form.street" class="input">
          <div v-if="form.errors.street" class="input-error">{{ form.errors.street }}</div>
        </div>
        <div class="col-span-2">
          <label class="label" for="street_nr">Street Nr</label>
          <input type="text" id="street_nr" v-model="form.street_nr" class="input">
          <div v-if="form.errors.street_nr" class="input-error">{{ form.errors.street_nr }}</div>
        </div>
        <div class="col-span-2">
          <label class="label" for="price">Price</label>
          <input type="number" id="price" v-model="form.price" class="input">
          <div v-if="form.errors.price" class="input-error">{{ form.errors.price }}</div>
        </div>
        <div class="col-span-2 grid gap-2">
          <button class="btn-primary" type="submit">Submit</button>
          <Link class="btn-cancel" :href="route('listings.index')">Back</Link>
        </div>
      </div>
    </form>
  </div>
</template>
<script setup>
import { Link, useForm } from '@inertiajs/vue3'
const form = useForm({
  beds: null,
  baths: null,
  area: null,
  city: null,
  code: null,
  street: null,
  street_nr: null,
  price: null
})
const submit = () => {
  form.post('/listings')
}
</script>
