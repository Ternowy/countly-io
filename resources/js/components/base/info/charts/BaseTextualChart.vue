<template>
  <div>
    <p v-for="(answer, index) in answers" :key="index">
      {{ index }}) {{ answer }}
    </p>
  </div>
</template>

<script>
export default {
  name: 'BaseTextualChart',
  props: {
    answers: Array
  }
};
</script>

<style scoped>

</style>