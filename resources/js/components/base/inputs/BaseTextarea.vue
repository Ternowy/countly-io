<template>
  <div v-bind="$attrs" class="w-full flex flex-col">
    <textarea ref="textarea" v-bind="$attrs" :value="value" class="w-full" :class="classes" @input="onInput"/>
    <slot/>
  </div>
</template>

<script>
export default {
  name: 'BaseTextarea',
  props: {
    value: String,
    classes: Array
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
