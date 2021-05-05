<template>
  <div v-bind="$attrs" class="w-full overflow-hidden overflow-ellipsis">
    <base-input v-show="active" ref="input" v-model="vValue" :maxlength="100" class="w-full"
                @blur="toggleActive"
    />
    <div v-show="!active" class="w-full whitespace-nowrap" @click="activate">{{ vValue }}</div>
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
