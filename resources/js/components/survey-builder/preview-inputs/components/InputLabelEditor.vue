<template>
  <div>
    <base-input v-show="active" ref="input" v-model="vValue" @blur="toggleActive"/>
    <div v-show="!active" @click="activate">>{{ vValue }}</div>
  </div>
</template>

<script>
import BaseInput from '../../../base/inputs/BaseInput';

export default {
  name: 'InputLabelEditor',
  components: {BaseInput},
  props: {
    value: String,
  },
  emits: ['input'],
  data: () => ({
    active: false,
  }),
  computed: {
    vValue: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit('input', value);
      },
    },
  },
  methods: {
    toggleActive() {
      this.active = !this.active;
    },
    activate() {
      this.toggleActive();
      this.$nextTick(() => this.$refs.input.focus());
    },
  },
};
</script>

<style scoped>

</style>