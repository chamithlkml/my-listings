<template>
        <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-700 w-full">
            <div class="container mx-auto">
                <nav class="p-4 flex items-center justify-between">
                    <div class="text-lg font-medium"><Link :href="route('listings.index')">Listings</Link></div>
                    <div class="text-xl text-indigo-600 dark:text-indigo-300"><Link :href="route('home')">My Listings</Link></div>
                    <div v-if="user" class="flex items-center gap-4">
                      <div class="text-sm text-gray-500">{{ user.name }}</div>
                      <Link :href="route('listings.create')" class="btn-primary">+ New Listing</Link>
                      <Link :href="route('destroy')" method="DELETE" as="button">Logout</Link>
                    </div>
                    <div v-else class="flex items-center gap-4">
                      <Link :href="route('user-account.create')">Register</Link>
                      <Link :href="route('login')">Sign In</Link>
                    </div>
                </nav>
            </div>
        </header>
    <main class="container mx-auto p-4 w-full">
        <div v-if="successMessage" class="mb-4 border rounded-md shadow-sm border-green-200 dard:border-green-800 bg-green-50 dark:bg-green-900">
            {{ successMessage }}
        </div>
        <slot />
    </main>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const successMessage = computed(() => usePage().props.flash.success)
const user = computed(() => usePage().props.user)
// const timer = ref(0)

// setInterval(() => {
//   timer.value++
// }, 1000)
</script>
