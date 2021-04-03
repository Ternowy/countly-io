<template>
  <div>
    <header>
      Hello
    </header>

    <editor-preview>
      <editor-preview-survey-description :name="surveyName" :description="surveyDescription"/>
      <editor-preview-input
        v-for="(item, index) in structure"
        :key="index"
        v-bind="item"
        @input="onInput($event, index)"
      />
    </editor-preview>
  </div>
</template>

<script>
import EditorPreview from './EditorPreview';
import EditorPreviewInput from './EditorPreviewInput';
import EditorPreviewSurveyDescription from './EditorPreviewSurveyDescription';


export default {
  name: 'Editor',
  components: {EditorPreviewSurveyDescription, EditorPreviewInput, EditorPreview},
  inject: ['api'],
  data: () => ({
    surveyName: 'Sample name',
    surveyDescription: 'Sample description',
    structure: [
      {
        'type': 'select',
        'label': 'example-survey.survey.input.select.label',
        'required': false,
        'options': [
          'example-survey.survey.input.select.option.a',
          'example-survey.survey.input.select.option.b',
          'example-survey.survey.input.select.option.c',
        ],
      },
    ],
  }),
  created() {

  },
  methods: {
    onInput(data, index) {
      this.$set(this.structure, index, data);
    },
    create() {
      this.api.survey.create({
        name: this.surveyName,
        description: this.surveyDescription,
        structure: this.structure,
      }).then((data) => {
        debugger
        let a = data;
      }).catch((err) => {
        debugger
        let a = err;
      });
    },
  },
};
</script>

<style scoped>

</style>