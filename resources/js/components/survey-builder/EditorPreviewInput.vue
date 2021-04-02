<template>
  <input-wrapper :is-required="value.required" :type="value.type" :label="value.label"
                 @input-label="onLabelInput" @input-type="onTypeInput" @input-is-required="onIsRequiredInput"
  >
    <template #input>
      <component :is="componentName" v-bind="$props"/>
    </template>
  </input-wrapper>
</template>

<script>
import InputCheckbox from './preview-inputs/InputCheckbox';
import InputRadio from './preview-inputs/InputRadio';
import InputSelect from './preview-inputs/InputSelect';
import InputText from './preview-inputs/InputText';
import InputTextarea from './preview-inputs/InputTextarea';
import InputWrapper from './preview-inputs/InputWrapper';

export default {
  name: 'EditorPreviewInput',
  components: {
    InputWrapper,
    InputCheckbox,
    InputRadio,
    InputSelect,
    InputText,
    InputTextarea,
  },
  props: {
    value: Object
  },
  emits: ['input'],
  data: () => ({
    typesWithText: ['text', 'textarea'],
  }),
  computed: {
    componentName() {
      return `input-${this.value.type}`;
    },
  },
  methods: {
    onInput(value) {
      this.$emit('input', Object.assign(this.value, value));
    },
    onLabelInput(label) {
      this.onInput({label});
    },
    onTypeInput(type) {
      this.onInput({type});
    },
    onIsRequiredInput(required) {
      this.onInput({required});
    }
  },
};
</script>

<style scoped>

</style>