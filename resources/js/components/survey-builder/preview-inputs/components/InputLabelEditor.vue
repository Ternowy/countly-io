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
    vValue: null
  }),
  watch: {
    value: {
      immediate: true,
      handler(val) {
        this.vValue = val;
      }
    }
  },
  methods: {
    toggleActive() {
      if (!this.vValue) {
        this.vValue = this.value;
      }

      if (this.vValue !== this.value) {
        this.$emit('input', this.vValue);
      }

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