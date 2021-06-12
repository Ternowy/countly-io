<template>
  <results>
    <div class="container">
      <div class="flex grid-cols-3">
        <result-chart v-for="(result, index) in Object.values(results)" :key="index" v-bind="result"/>
      </div>
    </div>
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