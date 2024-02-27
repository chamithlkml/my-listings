<template>
  <form @submit.prevent="register">
    <div class="container w-1/2 mx-auto">
      <div>
        <label for="name" class="label">Name</label>
        <input id="name" type="text" v-model="form.name" class="input"/>
        <div v-if="form.errors.email" class="input-error">{{ form.errors.name }}</div>
      </div>
      <div>
        <label for="email" class="label">Email</label>
        <input id="email" type="text" v-model="form.email" class="input"/>
        <div v-if="form.errors.email" class="input-error">{{ form.errors.email }}</div>
      </div>
      <div class="mt-4">
        <label for="password" class="label">Password</label>
        <input id="password" type="password" v-model="form.password" class="input"/>
        <div v-if="form.errors.password" class="input-error">{{ form.errors.password }}</div>
      </div>
      <div class="mt-4">
        <label for="password_confirmation" class="label">Password Confirmation</label>
        <input id="password_confirmation" type="password" v-model="form.password_confirmation" class="input"/>
        <div v-if="form.errors.password_confirmation" class="input-error">{{ form.errors.password_confirmation }}</div>
      </div>
      <div class="mt-4">
        <button class="btn-primary w-full" type="submit">Create</button>
        <div class="mt-2 text-center">
          <Link :href="route('login')" class="text-sm text-gray-500">Already have an account? Click here</Link>
        </div>
      </div>
    </div>
  </form>
</template>
<script setup>
import { useForm, Link } from '@inertiajs/vue3'
const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null
})
const register = () => {
  form.post(route('user-account.store'))
}
</script>
