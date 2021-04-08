<template>
  <div>
    <textarea ref="textarea" :value="value" @input="onInput"/>
    <slot/>
  </div>
</template>

<script>
export default {
  name: 'BaseTextarea',
  props: {
    value: String,
  },
  emits: ['input'],
  methods: {
    focus() {
      this.$refs.textarea.focus();
    },
    onInput(event) {
      this.$emit('input', event.target.value);
    },
  },
};
</script>

<style scoped>

</style>