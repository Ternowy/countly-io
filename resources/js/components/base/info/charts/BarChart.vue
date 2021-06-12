<template>
  <div class="flex flex-col">
    <div class="flex w-full flex-row justify-between">
      <p class="text-base">{{ label }}</p>
      <p class="text-base">{{ answersNumber }}</p>
    </div>
    <base-bar-chart :answers="answers"/>
  </div>
</template>

<script>
import BaseBarChart from './BaseBarChart';

export default {
  name: 'BarChart',
  components: {BaseBarChart},
  props: {
    label: String,
    answersNumber: Number,
    answers: Object
  }
};
</script>

<style scoped>

</style>
