<template>
  <div>
    <p v-for="(answer, index) in Object.values(answers)" :key="index">
      {{ index }}) {{ answer }}
    </p>
  </div>
</template>

<script>
export default {
  name: 'BaseTextualChart',
  props: {
    answers: Object
  }
};
</script>

<style scoped>

</style>