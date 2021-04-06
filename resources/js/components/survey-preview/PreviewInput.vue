<template>
  <component :is="componentName" v-model="vValue"/>
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
    type: String
  },
  emits: ['input'],
  computed: {
    componentName() {
      return `input-${this.type}`;
    },
  },
  methods: {

  },
};
</script>

<style scoped>

</style>