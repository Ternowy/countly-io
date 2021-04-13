<template>
  <div>
    <p>{{ label }} --- {{ answersNumber }}</p>
    <br>------  -<br>
    <base-textual-chart :answers="answers"/>
  </div>
</template>

<script>
import BaseTextualChart from './BaseTextualChart';
export default {
  name: 'TextualChart',
  components: {BaseTextualChart},
  props: {
    label: String,
    answersNumber: Number,
    answers: Array
  }
};
</script>

<style scoped>

</style>