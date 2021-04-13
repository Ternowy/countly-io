<template>
  <input-base v-bind="$attrs" :name="name">
    <template v-if="multiple">
      <checkbox-group :options="options" :value="value" @input="onChange"/>
    </template>
    <template v-else>
      <div v-for="(option, index) in options" :key="index">
        <label :for="`radio-${index}-${_uid}`">
          <input :id="`radio-${index}-${_uid}`" :checked="option === value" :name="name"
                 type="radio" @input="onChange(option)"
          >
          <div class="indicator"/>
          <div class="label">
            {{ option }}
          </div>
        </label>
      </div>
    </template>
  </input-base>
</template>

<script>
import CheckboxGroup from './CheckboxGroup';

export default {
  name: 'BaseOptions',
  components: {CheckboxGroup},
  props: {
    name: String,
    options: Array,
    multiple: {
      type: Boolean,
      default: false,
    },
    value: [String, Array],
  },
  emits: ['input'],
  methods: {
    onChange(value) {
      this.$emit('input', value);
    }
  },
};
</script>

<style scoped>

</style>