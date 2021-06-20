<template>
  <div class="container">
    <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-4 mt-10">
      <result-chart v-for="(result, index) in Object.values(results)" :key="index" v-bind="result"/>
    </div>
    <base-button color="red" label="Clear data" @click="onClearData"/>
  </div>
</template>

<script>
import ResultChart from './survey-results/ResultChart';

export default {
  name: 'SurveyResults',
  components: {ResultChart},
  props: {
    results: Object,
    survey: Object,
  },
  methods: {
    onClearData() {
    },
  },
};
</script>

<style scoped>

</style>