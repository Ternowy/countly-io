<template>
  <div class="container flex flex-col content-center justify-center items-center my-16">
    <div class="flex flex-col xl:w-5/12 md:w-7/12 sm:w-9/12 pb-10">
      <editor-preview-survey-description v-model="nameAndDescription"/>

      <editor-preview-input-list v-model="reactiveStructure" @input="onDrag">
        <editor-preview-input v-for="(item, index) in reactiveStructure" :key="`element-${index}`"
                              :ref="`element-${index}`"
                              v-bind="item"
                              :is-active="activeInputIndex === index"
                              :disable-type-change="isEditing"
                              @copy="copyInput(index)"
                              @input="onInput($event, index)"
                              @remove="removeInput(index)"
                              @activate="activateInput(index)"
        />
      </editor-preview-input-list>

      <editor-preview-cta-button v-model="ctaButton.label" @input="onStateChange"/>

      <base-button :disabled="inputs.length >= 15" type="action" size="large"
                   class="shadow-md w-48 mt-7 shadow-lg" fixed
                   @click.native="addInput"
      >
        <base-icon name="plus" clickable fill="#fff"/>
        <p class="ml-2 text-base text-base">Add new field</p>
      </base-button>

      <confirmation-modal ref="removalConfirmationModal" name="delete-input"/>
    </div>
  </div>
</template>

<script>
import EditorPreviewInputList from './EditorPreviewInputList';
import EditorPreviewInput from './EditorPreviewInput';
import EditorPreviewSurveyDescription from './EditorPreviewSurveyDescription';
import UniqueNameService from '../../service/unique-name-service';
import isEqual from 'lodash/_baseIsEqual';
import EditorPreviewCtaButton from './EditorPreviewCtaButton';

export default {
  name: 'Editor',
  components: {EditorPreviewCtaButton, EditorPreviewSurveyDescription, EditorPreviewInput, EditorPreviewInputList},
  props: {
    survey: Object,
    isEditing: Boolean
  },
  emits: ['survey-created', 'input'],
  data: () => ({
    surveyName: 'Sample name',
    surveyDescription: 'Sample description',
    inputs: [],
    ctaButton: {
      label: '🖐 Submit'
    },
    defaultInput: {
      type: 'select',
      label: 'Field name',
      name: UniqueNameService.generate(),
      required: false,
      placeholder: 'Type here'
    },
    activeInputIndex: null
  }),
  computed: {
    reactiveStructure: {
      get() {
        return this.inputs;
      },
      set(value) {
        this.inputs = value;
      },
    },
    nameAndDescription: {
      get() {
        return {
          name: this.surveyName,
          description: this.surveyDescription,
        };
      },
      set(value) {
        const {name, description} = value;
        this.surveyName = name;
        this.surveyDescription = description;

        this.onStateChange();
      },
    },
  },
  created() {
    if (this.survey) {
      const {name, description, structure} = this.survey;
      this.surveyName = name;
      this.surveyDescription = description;
      this.inputs = structure.inputs;
      this.ctaButton = structure.ctaButton;
    } else {
      this.addInput();
    }
  },
  methods: {
    onInput(data, index) {
      this.$set(this.inputs, index, data);
      this.onStateChange();
    },
    addInput() {
      let newInput = Object.assign({}, this.defaultInput, {name: UniqueNameService.generate()});
      newInput.options = ['1. ', '2. ', '3. '];
      this.inputs.push(newInput);

      this.activeInputIndex = this.inputs.length - 1;
      this.onStateChange();
      this.$nextTick(this.scrollToLastItem);
    },
    copyInput(index) {
      this.inputs.push(this.inputs[index]);
      this.onStateChange();
      this.$nextTick(this.scrollToLastItem);
    },
    removeInput(index) {
      this.$refs.removalConfirmationModal.show().then(() => {
        this.inputs.splice(index, 1);
        this.onStateChange();
      }).catch(() => {});
    },
    getState() {
      return {
        name: this.surveyName,
        description: this.surveyDescription,
        structure: {
          'inputs': this.inputs,
          'ctaButton': this.ctaButton
        }
      };
    },
    onDrag() {
      this.onStateChange();
      this.activateInput(null);
    },
    onStateChange() {
      this.$emit('input', this.getState());
    },
    activateInput(index) {
      this.activeInputIndex = index;
    },
    scrollToLastItem() {
      const lastItemIndex = this.reactiveStructure.length - 1;
      this.$scrollTo(this.$refs[`element-${lastItemIndex}`][0].$el, 750, {});
    }
  },
};
</script>

<style scoped>

</style>
