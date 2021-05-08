<template>
  <div v-bind="$attrs" class="w-full flex flex-row overflow-hidden overflow-ellipsis">
    <base-input ref="input" v-model="vValue" :maxlength="100" class="w-full"
                :input-classes="['p-2', 'bg-grey', 'border-b', 'border-gray-300']"
                @blur="toggleActive"
    />
    <slot/>
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
  },
};
</script>

<style lang="scss" scoped>
  .label-input {

  }
</style>
