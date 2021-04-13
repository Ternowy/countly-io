<template>
  <results>
    <result-chart v-for="(result, index) in Object.values(results)" :key="index" v-bind="result"/>
    <base-button color="red" label="Clear data" @click="onClearData"/>
  </results>
</template>

<script>
import Results from './survey-results/Results';
import ResultChart from './survey-results/ResultChart';
export default {
  name: 'SurveyResults',
  components: {ResultChart, Results},
  props: {
    results: Object,
    survey: Object
  },
  methods: {
    onClearData() {

    },

  }
};
</script>

<style scoped>

</style>