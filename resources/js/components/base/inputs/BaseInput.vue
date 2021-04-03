<template>
  <div>
    <input ref="input" v-model="vValue" type="text" @blur="onBlur">
  </div>
</template>

<script>
export default {
  name: 'BaseInput',
  props: {
    value: String,
  },
  emits: ['input', 'blur'],
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
    focus() {
      this.$refs.input.focus();
    },
    onBlur() {
      this.$emit('blur');
    }
  },
};
</script>

<style scoped>

</style>