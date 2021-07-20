<template>
  <div class="flex flex-row grid-cols-5 gap-1.5 justify-center items-center align-middle">
    <base-square-button v-for="(option, index) in options" :key="index"
                        :selected="option.value === value"
                        :icon="`input-${option.value}`"
                        :class="[{'bg-activeGreen': value === option.value}, ...classes]"
                        v-tooltip
                        :content="disabled ? disabledTooltip : option.tooltip"
                        class="w-16 h-16 lg:w-9 lg:h-9 rounded-md bg-grey"
                        @click.native="onSelect(option.value)"
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
  data() {
    return {
      disabledTooltip: 'You can not change type of the existing input'
    }
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
