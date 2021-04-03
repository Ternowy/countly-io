<template>
  <div>
    <base-square-button v-for="(option, index) in options" :key="index" :selected="option === value"
                        :icon="`input-${option}`"
                        @click.native="onSelect(option)"
    />
  </div>
</template>

<script>
export default {
  name: 'InputTypeSelector',
  props: {
    options: {
      type: Array,
      default: () => [],
    },
    value: String,
  },
  emits: ['input'],
  methods: {
    onSelect(type) {
      this.$emit('input', type);
    },
  },
};
</script>

<style scoped>

</style>