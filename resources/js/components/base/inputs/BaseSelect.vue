<template>
  <input-base :name="name" v-bind="$attrs" class="w-full rounded-lg good-shadow">
    <select v-model="vValue" :name="name" class="w-full py-2 px-4 rounded-lg select-input" @change="onInput">
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

<style lang="scss" scoped>
.select-input {
  margin: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image:
    linear-gradient(45deg, transparent 50%, gray 50%),
    linear-gradient(135deg, gray 50%, transparent 50%);
  background-position:
    calc(100% - 25px) calc(1em + 2px),
    calc(100% - 20px) calc(1em + 2px);
  background-size:
    5px 5px,
    5px 5px;
  background-repeat: no-repeat;
}
</style>
