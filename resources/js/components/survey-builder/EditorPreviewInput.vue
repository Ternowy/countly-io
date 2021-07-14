<template>
  <div v-if="isActive" class="flex w-full flex-col mb-8 bg-white px-7 pt-7 pb-5 rounded-3xl h-auto items-start">
    <div class="flex w-full flex-row items-start">
      <div class="flex flex-col w-7/12 h-full place-content-start">
        <input-label-editor :value="label" class="w-full label-editor"
                            @input="onInput('label', $event)"
        />
        <component :is="componentName" v-bind="$props" :value="inputValue" class="w-full mt-5"
                   @input="onInput(relevantInputValue, $event)"
        />
      </div>
      <div class="flex flex-col w-5/12 h-full">
        <div class="flex flex-row w-full justify-between">
          <span class="text-red-500 mr-4 ml-1">{{ required ? '*' : '' }}</span>
          <div class="flex flex-row justify-end">
            <base-switch :value="required"
                         label="Required"
                         v-tooltip
                         :content="required ? 'User can not submit answers without filling this field' : 'User can submit answers without filling this field'"
                         @input="onInput('required', $event)"
            />
            <base-popover ref="actionsPopover" class="ml-10" trigger="click">
              <template #trigger>
                <button>
                  <base-icon name="vertical-dots"/>
                </button>
              </template>

              <base-item-list>
                <base-item label="Copy" icon="copy" class="cursor-pointer px-2 py-1" fill="#828282"
                           @click.native="copy"
                />
                <base-item label="Delete" icon="trash" class="cursor-pointer px-2 py-1"
                           @click.native="remove"
                />
              </base-item-list>
            </base-popover>
          </div>
        </div>
        <input-type-selector :value="type" :options="inputTypes" class="mt-8 justify-end" :disabled="!!updated_at"
                             @input="onInput('type', $event)"
        />
      </div>
    </div>
    <div class="flex relative handle" style="left: 98%; cursor: grab">
      <base-icon name="drag" fill="#BDBDBD"/>
    </div>
  </div>
  <preview-input v-else v-bind="{label, options, required, type, name, placeholder}" class="cursor-pointer"
                 @click.native="onActivate"
  >
    <div class="flex relative mt-2 handle" style="left: 98%; cursor: grab">
      <base-icon name="drag" fill="#BDBDBD" v-tooltip content="Drag to move"/>
    </div>
  </preview-input>
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
import PreviewInput from '../survey-preview/PreviewInput';

export default {
  name: 'EditorPreviewInput',
  components: {
    PreviewInput,
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
      default: () => [],
    },
    placeholder: {
      type: String,
      default: '',
    },
    isActive: Boolean,
    disableTypeChange: Boolean,
    updated_at: String,
  },
  emits: ['input', 'copy', 'remove', 'activate'],
  data() {
    return {
      inputTypes: [
        {value: 'checkbox', tooltip: 'Multiple choice'},
        {value: 'radio', tooltip: 'Single choice'},
        {value: 'select', tooltip: 'Dropdown'},
        {value: 'text', tooltip: 'Short text'},
        {value: 'textarea', tooltip: 'Long text'},
      ],
    };
  },
  computed: {
    componentName() {
      return `input-${this.type}`;
    },
    relevantInputValue() {
      return ['text', 'textarea'].includes(this.type) ? 'placeholder' : 'options';
    },
    inputValue() {
      return this[this.relevantInputValue];
    },
  },
  methods: {
    onInput(item, value) {
      const data = Object.assign({
        name: this.name,
        type: this.type,
        label: this.label,
        required: this.required,
        options: this.options,
        placeholder: this.placeholder,
      }, {[item]: value});

      this.$emit('input', data);
    },
    copy() {
      this.closeActionsPopover();
      this.$emit('copy');
    },
    remove() {
      this.closeActionsPopover();
      this.$emit('remove');
    },
    closeActionsPopover() {
      this.$refs.actionsPopover.close();
    },
    onActivate() {
      this.$emit('activate');
    },
  },
};
</script>

<style lang="scss">
.good-shadow {
  box-shadow: 0px 2px 15px rgba(85, 85, 85, 0.15);
}
</style>
