<template>
  <input-base v-slot="{ errors }" v-bind="$attrs" :name="name">
    <div :class="[...classes, {'border border-red-700' : errors.length > 0}]">
      <input ref="input" :placeholder="placeholder" :value="value" type="text"
             :class="[...vClasses]"
             v-bind="$attrs" @blur="onBlur" @input="onInput"
      >
      <slot/>
    </div>
  </input-base>
</template>

<script>
export default {
  name: 'BaseInput',
  props: {
    name: String,
    value: String,
    classes: {
      type: Array,
      default: () => [],
    },
    placeholder: {
      type: String,
      default: '',
    },
    textCenter: Boolean,
    inputClasses: {
      type: Array,
      default: () => [],
    },
  },
  emits: ['input', 'blur'],
  computed: {
    vClasses() {
      let classes = ['w-full', 'rounded-t-lg', ...this.inputClasses];

      if (this.textCenter) {
        classes.push('text-center');
      }

      return classes;
    },
  },
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
