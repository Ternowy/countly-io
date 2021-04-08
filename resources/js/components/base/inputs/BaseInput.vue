<template>
  <input-base v-bind="$attrs" :name="name">
    <input ref="input" v-bind="$attrs" :placeholder="placeholder" :value="value" type="text"
           @blur="onBlur" @input="onInput"
    >
    <slot/>
  </input-base>
</template>

<script>
export default {
  name: 'BaseInput',
  props: {
    name: String,
    value: String,
    placeholder: {
      type: String,
      default: '',
    },
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