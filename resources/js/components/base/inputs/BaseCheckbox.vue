<template>
  <label class="flex w-full input-container mb-1 items-start content-center">
    <input ref="checkbox" v-model="vValue" :value="itemValue" :name="name" hidden type="checkbox">
    <span :class="['checkmark', {'checkmark-error' : errors.length > 0}]"></span>
    <p class="flex text-base font-normal text-grey ml-2">{{ label }}</p>
  </label>
</template>

<script>
export default {
  name: 'BaseCheckbox',
  props: {
    name: String,
    value: [Array, Object],
    itemValue: {
      type: [String, Boolean, Number],
      required: true,
    },
    label: String,
    errors: Array
  },
  emits: ['input'],
  computed: {
    vValue: {
      get() {
        return this.value;
      },
      set(newVal) {
        this.$emit('input', newVal);
      },
    },
  },
};
</script>

<style lang="scss" scoped>
/* The container */
.input-container {
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.input-container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  top: 0;
  left: 0;
  height: 18px;
  width: 18px;
  border: #828282 solid 1px;
  margin-top: 3px;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  display: none;
  margin-left: 5px;
}

/* Show the checkmark when checked */
.input-container input:checked ~ .checkmark:after {
  display: flex;
}

/* Style the checkmark/indicator */
.input-container .checkmark:after {
  width: 7px;
  height: 14px;
  border: solid green;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

.input-container .checkmark-error {
  border-width: 1px;
  border-color: #F95D51;
}
</style>
