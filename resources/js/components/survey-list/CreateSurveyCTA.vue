<template>
  <a :href="action">CREATE NEW SURVEY</a>
</template>

<script>
export default {
  name: 'CreateSurveyCTA',
  props: {
    action: {
      type: String,
      required: true
    }
  }
};
</script>

<style scoped>

</style>