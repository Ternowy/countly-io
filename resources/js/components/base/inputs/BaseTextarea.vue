<template>
  <input-base v-slot="{ errors }" v-bind="$attrs" :name="name">
    <div :class="[classes, {'border border-red-400' : errors.length > 0}]">
      <textarea ref="textarea" v-bind="$attrs" :name="name" :value="value" class="w-full" :class="vClasses"
                @input="onInput" @blur="onBlur"
      />
      <slot/>
    </div>
  </input-base>
</template>

<script>
export default {
  name: 'BaseTextarea',
  props: {
    name: String,
    value: String,
    classes: {
      type: Array,
      default: () => [],
    },
    inputClasses: {
      type: Array,
      default: () => [],
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
      return ['input-style', 'w-full', 'rounded-t-lg', ...this.inputClasses, `${this.size}-size`];
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
    },
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
