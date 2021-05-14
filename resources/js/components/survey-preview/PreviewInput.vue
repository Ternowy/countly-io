<template>
  <div class="flex w-full flex-col mb-8 bg-white px-7 pt-7 pb-5 rounded-3xl h-auto items-start good-shadow">
    <p class="text-base font-normal mb-2">{{ label }} <span class="text-red-500 mr-4">{{ required ? '*' : '' }}</span></p>
    <component :is="componentName" v-model="vValue" v-bind="$attrs" v-on="$listeners"/>
    <slot/>
  </div>
</template>

<script>
import vValueMixin from '../../mixins/helpers/v-value-mixin.js';
import InputCheckbox from './preview-inputs/InputCheckbox.vue';
import InputRadio from './preview-inputs/InputRadio.vue';
import InputSelect from './preview-inputs/InputSelect.vue';
import InputText from './preview-inputs/InputText.vue';
import InputTextarea from './preview-inputs/InputTextarea.vue';

export default {
  name: 'PreviewInput',
  components: {
    InputCheckbox,
    InputRadio,
    InputSelect,
    InputText,
    InputTextarea,
  },
  mixins: [vValueMixin],
  props: {
    type: String,
    label: String,
    required: Boolean
  },
  emits: ['input'],
  computed: {
    componentName() {
      return `input-${this.type}`;
    },
  },
};
</script>

<style scoped>

</style>
