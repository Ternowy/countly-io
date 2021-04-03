<template>
  <div>
    <p>{{ status }}</p>
  </div>
</template>

<script>
export default {
  name: 'SavingStatus',
  props: {
    status: {
      type: String,
      required: true,
      validate: (value) => ['saving', 'saved'].includes(value),
    },
  }
};
</script>

<style scoped>

</style>