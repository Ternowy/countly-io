<template>
  <div class="flex w-full text-right justify-items-end justify-end">
    {{ value }} / {{ limit }}
  </div>
</template>

<script>
export default {
  name: 'BaseCounter',
  props: {
    limit: {
      type: Number,
      default: 100
    },
    value: {
      type: Number,
      default: 0
    }
  }
};
</script>

<style scoped>

</style>
