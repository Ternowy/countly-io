<template>
  <div>
    <input-label-editor v-model="inputData.label" @input="onInput"/>
    <input-type-selector v-model="inputData.type" :options="inputTypes" @input="onInput"/>
    <base-switch v-model="inputData.required" @input="onInput"/>
    <component :is="componentName" v-bind="$props" v-model="inputValue" @input="onInput"/>
    <base3-dots-menu>
      <base-item-list>
        <base-item label="copy" icon="copy" @click.native="copy"/>
        <base-item label="delete" icon="delete" @click.native="remove"/>
      </base-item-list>
    </base3-dots-menu>
  </div>
</template>

<script>
import InputCheckbox from './preview-inputs/InputCheckbox.vue';
import InputRadio from './preview-inputs/InputRadio.vue';
import InputSelect from './preview-inputs/InputSelect.vue';
import InputText from './preview-inputs/InputText.vue';
import InputTextarea from './preview-inputs/InputTextarea.vue';
import InputLabelEditor from './preview-inputs/components/InputLabelEditor.vue';
import InputTypeSelector from './preview-inputs/components/InputTypeSelector.vue';
import BaseSwitch from '../base/inputs/BaseSwitch.vue';

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
  emits: ['input', 'copy', 'remove'],
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
    relevantInputValue() {
      return ['text', 'textarea'].includes(this.type) ? 'placeholder' : 'options';
    },
    inputValue: {
      get() {
        return this.inputData[this.relevantInputValue];
      },
      set(value) {
        this.inputData[this.relevantInputValue] = value;
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
    copy() {
      this.$emit('copy');
    },
    remove() {
      this.$emit('remove');
    }
  },
};
</script>

<style scoped>

</style>