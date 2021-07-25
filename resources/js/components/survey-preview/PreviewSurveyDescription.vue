<template>
  <div class="flex w-full flex-col justify-center items-center mb-10 bg-white p-7 rounded-3xl good-shadow">
    <h1 class="text-3xl text-center">{{ name }}</h1>
    <h2 class="text-center mt-4">{{ description }}</h2>
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
