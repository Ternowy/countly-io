<template>
  <preview ref="form">
    <preview-survey-description :name="name" :description="description"/>
    <preview-input v-for="(input, index) in structure" :key="index" v-bind="input"
                   v-model="surveyData[input.name]" @input="onInput"
    />
    <base-button :disabled="!surveyValid" label="🖐 Submit" @click="onSubmit"/>
  </preview>
</template>

<script>
import Preview from './survey-preview/Preview';
import survey from '../api/survey/survey';
import {getAxios} from '../api/axios';
import PreviewSurveyDescription from './survey-preview/PreviewSurveyDescription';
import PreviewInput from './survey-preview/PreviewInput';

export default {
  name: 'SurveyPreview',
  components: {PreviewInput, PreviewSurveyDescription, Preview},
  props: {
    name: String,
    description: String,
    structure: Array,
    accessCode: String,
    submitSurveyUri: String,
  },
  data() {
    const surveyApi = survey(getAxios(), {
      submit: this.submitSurveyUri,
    });

    return {
      api: {
        survey: surveyApi,
      },
      surveyData: {},
      surveyValid: false,
    };
  },
  created() {
    this.structure.forEach(({name}) => this.$set(this.surveyData, name, ''));
  },
  methods: {
    onInput() {
      this.$nextTick(
          () => this.$refs.form.validate().then(valid => this.surveyValid = valid)
      );
    },
    onSubmit() {
      this.api.survey.submit(this.surveyData).then(() => {
        //Internal view routing to success page
      });
    },
  },
};
</script>

<style scoped>

</style>