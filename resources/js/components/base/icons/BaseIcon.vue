<template>
  <div>{{ name }}</div>
</template>

<script>
export default {
  name: 'BaseIcon',
  props: {
    name: {
      type: String,
      required: true
    }
  }
};
</script>

<style scoped>

</style>