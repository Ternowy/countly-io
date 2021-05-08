<template>
  <div class="container flex flex-col content-center justify-center items-center mt-20">
    <div class="flex flex-col xl:w-5/12 md:w-7/12 sm:w-9/12">
      <editor-preview-survey-description v-model="nameAndDescription"/>

      <editor-preview-input-list v-model="reactiveStructure" @end="onDragEnd">
        <editor-preview-input v-for="(item, index) in reactiveStructure" :key="`element-${index}`"
                              v-bind="item"
                              @copy="copyInput(index)"
                              @input="onInput($event, index)"
                              @remove="removeInput(index)"
        />
      </editor-preview-input-list>

      <base-interactive-button :disabled="reactiveStructure.length >= 15" label="+"
                               @click.native="addInput"
      />
    </div>
  </div>
</template>

<script>
import EditorPreviewInputList from './EditorPreviewInputList';
import EditorPreviewInput from './EditorPreviewInput';
import EditorPreviewSurveyDescription from './EditorPreviewSurveyDescription';
import UniqueNameService from '../../service/unique-name-service';

export default {
  name: 'Editor',
  components: {EditorPreviewSurveyDescription, EditorPreviewInput, EditorPreviewInputList},
  props: {
    survey: Object
  },
  emits: ['survey-created', 'input'],
  data: () => ({
    surveyName: 'Sample name',
    surveyDescription: 'Sample description',
    structure: [],
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
  }),
  computed: {
    reactiveStructure: {
      get() {
        return this.structure;
      },
      set(value) {
        this.structure = value;
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
      this.structure = structure;
    } else {
      this.addInput();
    }
  },
  methods: {
    onInput(data, index) {
      this.$set(this.structure, index, data);
      this.onStateChange();
    },
    addInput() {
      this.structure.push(Object.assign({}, this.defaultInput, {name: UniqueNameService.generate()}));
      this.onStateChange();
    },
    copyInput(index) {
      this.structure.push(this.structure[index]);
    },
    removeInput(index) {
      this.structure.splice(index, 1);
    },
    getState() {
      return {
        name: this.surveyName,
        description: this.surveyDescription,
        structure: this.structure,
      };
    },
    onDragEnd() {
      this.onStateChange();
    },
    onStateChange() {
      this.$emit('input', this.getState());
    }
  },
};
</script>

<style scoped>

</style>
