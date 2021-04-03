<template>
  <div>
    <input ref="input" v-bind="$attrs" :value="value" type="text" @blur="onBlur" @input="onInput">
    <slot name="right-corner"/>
  </div>
</template>

<script>
export default {
  name: 'BaseInput',
  props: {
    value: String,
  },
  emits: ['input', 'blur'],
  methods: {
    focus() {
      this.$refs.input.focus();
    },
    onBlur() {
      this.$emit('blur');
    },
    onInput(event) {
      this.$emit('input', event.target.value);
    },
  },
};
</script>

<style scoped>

</style>