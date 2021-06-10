<template>
  <base-button type="action" class="w-44 mb-2 px-2">
    <input ref="input" v-model="vValue" type="text" maxlength="24"
           class="w-full bg-transparent text-base text-center text-white text-lg font-medium"
           @blur="onBlur"
    >
  </base-button>
</template>

<script>
export default {
  name: 'EditorPreviewCtaButton',
  props: {
    value: String,
  },
  emits: ['input'],
  data() {
    return {
      vValue: ''
    }
  },
  watch: {
    value: {
      immediate: true,
      handler(val) {
        this.vValue = val;
      }
    }
  },
  methods: {
    onBlur() {
      if (!this.vValue) {
        this.vValue = this.value;
      }

      if (this.vValue !== this.value) {
        this.$emit('input', this.vValue);
      }
    },
  },
};
</script>

<style scoped>

</style>