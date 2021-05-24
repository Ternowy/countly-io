<template>
  <input-base v-slot="{ errors }" v-bind="$attrs" :name="name" :rules="rules" :rules-messages="rulesMessages">
    <component :is="componentName"
               :options="options" :value="value" :name="name" :errors="errors"
               @input="onChange"
    />
  </input-base>
</template>

<script>
import CheckboxGroup from './CheckboxGroup';
import RadioGroup from './RadioGroup';

export default {
  name: 'BaseOptions',
  components: {RadioGroup, CheckboxGroup},
  props: {
    name: String,
    options: Array,
    multiple: {
      type: Boolean,
      default: false,
    },
    value: [String, Array],
    rules: {
      type: Object,
      default: () => ({}),
    },
    rulesMessages: {
      type: Object,
      default: () => ({}),
    },
  },
  emits: ['input'],
  computed: {
    componentName() {
      return this.multiple ? 'CheckboxGroup' : 'RadioGroup';
    }
  },
  methods: {
    onChange(value) {
      this.$emit('input', value);
    }
  },
};
</script>