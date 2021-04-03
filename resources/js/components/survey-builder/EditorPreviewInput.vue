<template>
  <div>
    <input-label-editor v-model="inputData.label" @input="onInput"/>
    <input-type-selector v-model="inputData.type" :options="inputTypes" @input="onInput"/>
    <base-switch v-model="inputData.required" @input="onInput"/>
    <component :is="componentName" v-bind="$props" v-model="inputValue" @input="onInput"/>
  </div>
</template>

<script>
import InputCheckbox from './preview-inputs/InputCheckbox';
import InputRadio from './preview-inputs/InputRadio';
import InputSelect from './preview-inputs/InputSelect';
import InputText from './preview-inputs/InputText';
import InputTextarea from './preview-inputs/InputTextarea';
import InputLabelEditor from './preview-inputs/components/InputLabelEditor';
import InputTypeSelector from './preview-inputs/components/InputTypeSelector';
import BaseSwitch from '../base/inputs/BaseSwitch';

export default {
  name: 'EditorPreviewInput',
  components: {
    BaseSwitch,
    InputTypeSelector,
    InputLabelEditor,
    InputCheckbox,
    InputRadio,
    InputSelect,
    InputText,
    InputTextarea,
  },
  props: {
    required: Boolean,
    label: String,
    type: String,
    options: {
      type: Array,
      default: () => []
    },
    placeholder: {
      type: String,
      default: ''
    }
  },
  emits: ['input'],
  data: () => ({
    inputData: {
      required: null,
      label: null,
      type: null,
      options: null,
      placeholder: null
    },
    inputTypes: ['checkbox', 'radio', 'select', 'text', 'textarea']
  }),
  computed: {
    componentName() {
      return `input-${this.type}`;
    },
    isTextComponent() {
      return ['text', 'textarea'].includes(this.type);
    },
    inputValue: {
      get() {
        const relevantOption = this.isTextComponent ? 'placeholder' : 'options';
        return this.inputData[relevantOption];
      },
      set(value) {
        const relevantOption = this.isTextComponent ? 'placeholder' : 'options';
        this.inputData[relevantOption] = value;
      }
    }
  },
  created() {
    this.inputData = {
      required: this.required,
      label: this.label,
      type: this.type,
      options: this.options,
      placeholder: this.placeholder
    }
  },
  methods: {
    onInput() {
      this.$emit('input', this.inputData);
    },
  },
};
</script>

<style scoped>

</style>