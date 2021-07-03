<template>
  <chart-wrapper v-bind="{label, answersNumber}">
    <base-textual-chart :answers="answers"/>
  </chart-wrapper>
</template>

<script>
import BaseTextualChart from './Base/BaseTextualChart';
import ChartWrapper from './ChartWrapper';

export default {
  name: 'TextualChart',
  components: {BaseTextualChart, ChartWrapper},
  props: {
    label: String,
    answersNumber: Number,
    answers: Array,
  },
};
</script>

<style scoped>

</style>