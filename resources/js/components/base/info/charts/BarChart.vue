<template>
  <div>
    <p>{{ label }} --- {{ answersNumber }}</p>
    <br>------<br>
    <v-chart :answers="answers"/>
  </div>
</template>

<script>
import VChart from './vChart';

export default {
  name: 'BarChart',
  components: {VChart},
  props: {
    label: String,
    answersNumber: Number,
    answers: Object
  }
};
</script>

<style scoped>

</style>
