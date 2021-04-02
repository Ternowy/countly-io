<template>
  <vue-toggles
    :value="value"
    checked-bg="#b4d455"
    height="30"
    unchecked-bg="lightgrey"
    width="90"
    @click="onClick"
  />
</template>

<script>
import VueToggles from 'vue-toggles';

export default {
  name: 'BaseSwitch',
  components: {
    VueToggles,
  },
  props: {
    value: Boolean,
  },
  emits: ['input'],
  methods: {
    onClick() {
      this.$emit('input', !this.value);
    },
  },
};
</script>

<style scoped>

</style>