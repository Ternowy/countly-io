<template>
  <div class="flex w-full flex-row mb-10 bg-white p-7 rounded-3xl h-auto items-start">
    <div class="flex flex-col w-7/12 h-full place-content-start">
      <input-label-editor v-model="inputData.label" class="w-full label-editor" @input="onInput"/>
      <component :is="componentName" v-bind="$props" v-model="inputValue" class="w-full" @input="onInput"/>
    </div>
    <div class="flex flex-col w-5/12 h-full">
      <div class="flex flex-row w-full justify-end">
        <base-switch v-model="inputData.required" class="" label="Required" @input="onInput"/>
        <base-popover class="ml-10" trigger="click">
          <template #trigger>
            <button>
              <base-icon name="vertical-dots"/>
            </button>
          </template>

          <base-item-list>
            <base-item label="copy" icon="copy" @click.native="copy"/>
            <base-item label="delete" icon="trash" @click.native="remove"/>
          </base-item-list>
        </base-popover>
      </div>
      <input-type-selector v-model="inputData.type" :options="inputTypes" class="mt-8 justify-end"
                           @input="onInput"
      />
    </div>
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
    name: String,
    type: String,
    label: String,
    required: Boolean,
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
      name: null,
      type: null,
      label: null,
      required: null,
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
      name: this.name,
      type: this.type,
      label: this.label,
      required: this.required,
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
