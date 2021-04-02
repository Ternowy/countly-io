<template>
  <div>
    <input-title-editor v-model="vLabel"/>
    <input-type-selector v-model="vType" :options="types"/>
    <base-switch v-model="vIsRequired"/>
    <slot name="input"/>
  </div>
</template>

<script>
import InputTitleEditor from './components/InputTitleEditor';
import InputTypeSelector from './components/InputTypeSelector';
import BaseSwitch from '../../base/inputs/BaseSwitch';

export default {
  name: 'InputWrapper',
  components: {
    BaseSwitch,
    InputTypeSelector,
    InputTitleEditor
  },
  props: {
    label: String,
    type: String,
    isRequired: Boolean
  },
  emits: ['input-label', 'input-type', 'input-is-required'],
  data: () => ({
    types: ['checkbox', 'radio', 'select', 'text', 'textarea']
  }),
  computed: {
    vLabel: {
      get() {
        return this.label;
      },
      set(val) {
        this.$emit('input-label', val);
      }
    },
    vType: {
      get() {
        return this.type;
      },
      set(val) {
        this.$emit('input-type', val);
      }
    },
    vIsRequired: {
      get() {
        return this.isRequired;
      },
      set(val) {
        this.$emit('input-is-required', val);
      }
    }
  }
};
</script>

<style scoped>

</style>