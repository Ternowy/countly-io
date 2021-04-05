<template>
  <div>
    <p>{{ name }}</p>
    <p>{{ description }}</p>
  </div>
</template>

<script>
export default {
  name: 'PreviewSurveyDescription',
  props: {
    name: String,
    description: String,
  }
};
</script>

<style scoped>

</style>