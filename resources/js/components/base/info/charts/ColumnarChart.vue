<template>
  <div>
    <p>{{ label }} --- {{ answersNumber }}</p>
    <br>------<br>
    <base-columnar-chart :answers="answers"/>
  </div>
</template>

<script>
import BaseColumnarChart from './BaseColumnarChart';
export default {
  name: 'ColumnChart',
  components: {BaseColumnarChart},
  props: {
    label: String,
    answersNumber: Number,
    answers: Object
  }
};
</script>

<style scoped>

</style>