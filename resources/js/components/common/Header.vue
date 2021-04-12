<template>
  <div>
    <p>{{ answersNumber }} / {{ answersLimit }}</p>

    LOGO
  </div>
</template>

<script>
export default {
  name: 'Header',
  props: {
    answersLimit: Number,
    answersNumber: Number,
  }
};
</script>

<style scoped>

</style>