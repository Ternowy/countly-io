<template>
  <div>
    <input-option-list>
      <input-option v-for="(option, index) in value" :key="index" :value="option"
                    @input="onOptionInput($event, index)" @remove="removeOption(index)"
      />
    </input-option-list>
    <base-button type="passive" @click.native="addOption">
      + Add answer
    </base-button>
  </div>
</template>

<script>
import InputOptionList from './InputOptionList';
import InputOption from './InputOption';
import vValueMixin from '../../../../mixins/helpers/v-value-mixin';

export default {
  name: 'InputWithOptions',
  components: {InputOption, InputOptionList},
  mixins: [vValueMixin],
  emits: ['input'],
  methods: {
    addOption() {
      this.$emit('input', [...this.value, 'Text']);
    },
    removeOption(index) {
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
