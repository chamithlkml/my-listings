<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
      <Box class="md:col-span-7 flex items-center w-full">
        <div class="w-full text-center font-medium text-gray-500">No images</div>
      </Box>
      <div class="md:col-span-5 flex flex-col gap-4">
        <Box>
          <template #header>Basic Info</template>
          <Price :price="listing.price"/>
          <ListingSpace :listing="listing" class="text-lg" />
          <ListingDetails :listing="listing"/>
          <Link :href="route('listings.index')">Back</Link>
        </Box>
        <Box>
          <template #header>Monthly Payment</template>
          <div>
            <label class="label">Interest rate {{ interestRate }}</label>
            <input v-model.number="interestRate" type="range" min="0.1" max="30" step="0.1" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"/>

            <label class="label">Duration ({{ duration }} years)</label>
            <input v-model.number="duration" type="range" min="3" max="35" step="1" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"/>

            <div class="text-gray-600 dark:text-gray-300 mt-2">
              <div class="text-gray-400">Your monthly payment</div>
              <Price :price="monthlyPayment" class="text-3xl"></Price>
            </div>

            <div class="mt-2 text-gray-500">
              <div class="flex justify-between">
                <div>Total paid</div>
                <div>
                  <Price :price="totalPaid"></Price>
                </div>
              </div>
              <div class="flex justify-between">
                <div>Principle paid</div>
                <div>
                  <Price :price="listing.price"></Price>
                </div>
              </div>
              <div class="flex justify-between">
                <div>Interest paid</div>
                <div>
                  <Price :price="totalInterest"></Price>
                </div>
              </div>
            </div>
          </div>
        </Box>
      </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'
import ListingDetails from '@/Components/ListingDetails.vue'
import Price from '@/Components/UI/Price.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import Box from '@/Components/UI/Box.vue'
// Composable
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment'
const props = defineProps({
  listing: Object
})
const interestRate = ref(0.1)
const duration = ref(3)
const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(
  props.listing.price, interestRate, duration
)
</script>
