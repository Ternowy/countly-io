<template>
  <div class="flex flex-col bg-white rounded-3xl">
    <div class="flex w-full flex-row justify-between h-12 px-5 py-5">
      <p class="text-base">{{ label }}</p>
      <p class="text-base">{{ answersNumber }}</p>
    </div>
    <base-bar-chart :answers="formattedAnswers"/>
    <div class="flex w-fullgrid-rows-3 grid-flow-col gap-2">
      <div v-for="(inputLabel, index) in Object.keys(answers)" :key="index" class="flex flex-row">
        <div class="w-4 h-4 rounded-full bg-gray-400"></div>
        {{ index + 1 }}) {{ inputLabel }}
      </div>
    </div>
  </div>
</template>

<script>
import BaseBarChart from './BaseBarChart';
import ChartDataFormatter from '../../../../service/chart-data-formatter';

export default {
  name: 'BarChart',
  components: {BaseBarChart},
  props: {
    label: String,
    answersNumber: Number,
    answers: Object
  },
  data() {
    return {
      formattedAnswers: ChartDataFormatter.formatData(this.answers, 'label', 'value'),
    }
  },
  computed: {

  }
};
</script>

<style scoped>

</style>
