<template>
  <input-base :name="name" v-bind="$attrs">
    <select v-model="vValue" :name="name" class="form-select w-100" @change="onInput">
      <option value="" disabled :selected="!value">{{ defaultLabel }}</option>
      <option v-for="(option, index) in options" :key="index" :value="option">
        {{ option }}
      </option>
    </select>
  </input-base>
</template>

<script>
export default {
  name: 'BaseSelect',
  props: {
    options: Array,
    name: String,
    value: String,
    defaultLabel: {
      type: String,
      default: 'Choose option'
    }
  },
  emits: ['input'],
  data: () => ({
    vValue: '',
  }),
  watch: {
    value(val) {
      if (val !== this.vValue) {
        this.vValue = val;
      }
    },
  },
  created() {
    if (this.value) {
      this.vValue = this.value;
    }
  },
  methods: {
    onInput(event) {
      this.$emit('input', event.target.value);
    },
  },
};
</script>

<style scoped>

</style>