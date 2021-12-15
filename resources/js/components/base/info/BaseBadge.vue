<template>
  <div :class="classes">
    <p v-if="label" class="text-white text-sm">{{ label }}</p>
    <slot v-else/>
  </div>
</template>

<script>
export default {
  name: 'BaseBadge',
  props: {
    type: {
      type: String,
      default: 'default'
    },
    label: String
  },
  computed: {
    classes() {
      let classes = ['rounded-xl px-3'];
      let types = {default: 'bg-green-500', warning: 'bg-yellow-500', danger: 'bg-red-500', inactive: 'bg-gray-400'};
      classes.push(types[this.type]);

      return classes;
    },
  }
}
</script>

<style scoped>

</style>