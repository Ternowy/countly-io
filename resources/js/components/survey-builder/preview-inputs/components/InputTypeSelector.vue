<template>
  <div class="flex flex-row grid-cols-5 gap-1.5">
    <base-square-button v-for="(option, index) in options" :key="index" :selected="option === value"
                        :icon="`input-${option}`" :class="[{'bg-activeGreen': value === option}, ...classes]"
                        class="w-9 h-9 rounded-md bg-grey"
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
    disabled: Boolean
  },
  emits: ['input'],
  computed: {
    classes() {
      let classes = [];

      if (!this.disabled) {
        classes.push('hover:bg-activeGreen');
      }

      return classes;
    }
  },
  methods: {
    onSelect(type) {
      if (this.disabled) {
        return;
      }

      this.$emit('input', type);
    },
  },
};
</script>

<style scoped>

</style>
