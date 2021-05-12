<template>
  <div v-bind="$attrs" class="w-full flex flex-col">
    <textarea ref="textarea" v-bind="$attrs" :value="value" class="w-full" :class="vClasses"
              @input="onInput" @blur="onBlur"
    />
    <slot/>
  </div>
</template>

<script>
export default {
  name: 'BaseTextarea',
  props: {
    value: String,
    classes: {
      type: Array,
      default: () => []
    },
    size: {
      type: String,
      default: 'medium',
      validator: value => ['small', 'medium'].includes(value),
    },
  },
  emits: ['input', 'blur'],
  computed: {
    vClasses() {
      return ['input-style', ...this.classes, `${this.size}-size`];
    },
  },
  methods: {
    focus() {
      this.$refs.textarea.focus();
    },
    onInput(event) {
      this.$emit('input', event.target.value);
    },
    onBlur() {
      this.$emit('blur');
    }
  },
};
</script>

<style lang="scss" scoped>
.input-style {
  min-height: 50px
}

.medium-size {
  min-height: 100px
}
</style>
