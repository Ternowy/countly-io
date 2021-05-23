<template>
  <input-base :label="label" :name="name" :rules="rules" :rules-messages="rulesMessages">
    <div v-for="(option, index) in options" :key="index">
      <label :for="`radio-${index}-${_uid}`" class="flex flex-row items-center input-container mb-1">
        <input :id="`radio-${index}-${_uid}`" :checked="option === value" :name="name"
               type="radio" class="checkmark" @input="onChange(option)"
        >
        <span class="checkmark"></span>
        <div class="flex text-base font-normal text-grey ml-2">{{ option }}</div>
      </label>
    </div>
  </input-base>
</template>

<script>
export default {
  name: 'RadioGroup',
  props: {
    name: String,
    value: String,
    options: {
      type: Array,
      required: true,
    },
    label: String,
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
  methods: {
    onChange(value) {
      this.$emit('input', value);
    }
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
  margin-top: 2px;
  border-radius: 9px;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  display: none;
  margin-left: 4px;
}

/* Show the checkmark when checked */
.input-container input:checked ~ .checkmark:after {
  display: flex;
}

/* Style the checkmark/indicator */
.input-container .checkmark:after {
  width: 8px;
  height: 8px;
  border-radius: 8px;
  margin-top: 4px;
  background-color: green;
}
</style>
