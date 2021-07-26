<template>
  <div class="flex-col">
    <input-option v-for="(option, index) in value" :key="index" :value="option"
                  @input="onOptionInput($event, index)" @remove="removeOption(index)"
    />
    <base-button type="grey" size="small" class="p-4 text-sm mt-2" :disabled="!canAdd" @click.native="addOption">
      + Add option
    </base-button>
    <confirmation-modal ref="deleteOptionConfirmationModal" :name="`delete-option-${_uid}`"
                        description="All answers with selected option will be hidden"
    />
  </div>
</template>

<script>
import InputOption from './InputOption';
import vValueMixin from '../../../../mixins/helpers/v-value-mixin';

export default {
  name: 'InputWithOptions',
  components: {InputOption},
  mixins: [vValueMixin],
  emits: ['input'],
  props: {
    disableTypeChange: Boolean
  },
  computed: {
    canAdd() {
      return this.value.length < 10;
    }
  },
  methods: {
    addOption() {
      this.$emit('input', [...this.value, 'Text']);
    },
    removeOption(index) {
      if (this.disableTypeChange) {
        this.$refs.deleteOptionConfirmationModal.show().
          then(() => this.processOptionRemoval(index)).
          catch(() => {});
      } else {
        this.processOptionRemoval(index);
      }
    },
    processOptionRemoval(index) {
      const options = this.value;
      options.splice(index,1);
      this.$emit('input', options);
    },
    onOptionInput(value, index) {
      const options = this.value;
      options[index] = value;
      this.$emit('input', options);
    }
  },
};
</script>

<style scoped>

</style>
