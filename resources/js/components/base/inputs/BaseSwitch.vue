<template>
  <div v-bind="$attrs" class="flex flex-row align-middle justify-center items-center">
    <p v-if="label" class="text-sm font-light px-3">{{ label }}</p>
    <label class="switch">
      <input type="checkbox" :id="`checkbox-${_uid}`" v-model="vValue">
      <span class="slider round"></span>
    </label>
    <slot/>
  </div>
</template>

<script>
import vValueMixin from '../../../mixins/helpers/v-value-mixin.js';

export default {
  name: 'BaseSwitch',
  mixins: [vValueMixin],
  props: {
    value: Boolean,
    background: {
      type: String,
      default: 'green',
    },
    color: {
      type: String,
      default: 'white',
    },
    label: String
  },
  emits: ['input'],
  computed: {
    buttonClasses() {
      const classes = [];
      classes.push(this.value ? 'bg-' + this.background : 'bg-disabled');
      return classes;
    },
  },
};
</script>

<style lang="scss" scoped>
.switch {
  position: relative;
  display: inline-block;
  width: 51.5px;
  height: 26px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 21px;
  width: 21px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #29AD62;
}

input:focus + .slider {
  box-shadow: 0 0 1px #29AD62;
}

input:checked + .slider:before {
  -webkit-transform: translateX(24px);
  -ms-transform: translateX(24px);
  transform: translateX(24px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
