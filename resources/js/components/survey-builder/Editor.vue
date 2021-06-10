<template>
  <div class="container flex flex-col content-center justify-center items-center my-16">
    <div class="flex flex-col xl:w-5/12 md:w-7/12 sm:w-9/12">
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
                              @click.native="activateInput(index)"
        />
      </editor-preview-input-list>

      <editor-preview-cta-button v-model="ctaButton.label" @input="onStateChange"/>

      <base-button :disabled="inputs.length >= 15" type="action" size="large" rounded
                   class="shadow-md"
                   @click.native="addInput"
      >
        <base-icon name="plus" clickable fill="#fff"/>
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
      label: 'This is a new input!',
      name: UniqueNameService.generate(),
      required: false,
      options: [
        'Option 1',
        'Option 2',
        'Option 3',
      ],
      placeholder: 'placeholder'
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
      this.inputs.push(Object.assign({}, this.defaultInput, {name: UniqueNameService.generate()}));
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
