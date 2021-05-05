<template>
  <div class="flex flex-row grid-cols-5 gap-1.5">
    <base-square-button v-for="(option, index) in options" :key="index" :selected="option === value"
                        :icon="`input-${option}`" class="w-9 h-9 rounded-md bg-grey hover:bg-activeGreen"
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
