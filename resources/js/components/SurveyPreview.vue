<template>
  <success-window v-if="isSubmitted" :link="homeUri"/>
  <preview v-else ref="form" @submit.prevent="onSubmit">
    <preview-survey-description :name="name" :description="description"/>
    <preview-input v-for="(input, index) in inputs" :key="index" v-bind="input"
                   v-model="surveyData[input.name]"
    />
    <base-button type="action" class="w-52" @click="onSubmit">
      <p class="text-base text-white text-lg font-medium">{{ ctaButton.label }}</p>
    </base-button>
  </preview>
</template>

<script>
import Preview from './survey-preview/Preview';
import survey from '../api/survey/survey';
import {getAxios} from '../api/axios';
import PreviewSurveyDescription from './survey-preview/PreviewSurveyDescription';
import PreviewInput from './survey-preview/PreviewInput';
import SuccessWindow from './survey-preview/SuccessWindow';

export default {
  name: 'SurveyPreview',
  components: {SuccessWindow, PreviewInput, PreviewSurveyDescription, Preview},
  props: {
    name: String,
    description: String,
    structure: Object,
    accessCode: String,
    submitSurveyUri: String,
    homeUri: String,
  },
  data() {
    const surveyApi = survey(getAxios(), {
      submit: this.submitSurveyUri,
    });

    return {
      api: {
        survey: surveyApi,
      },
      inputs: this.structure.inputs,
      ctaButton: this.structure.ctaButton,
      surveyData: {},
      surveyValid: false,
      isSubmitted: false,
    };
  },
  created() {
    this.inputs.forEach(({name, type}) => {
      this.$set(this.surveyData, name, type === 'checkbox' ? [] : null);
    });
  },
  methods: {
    onInput() {
    },
    onSubmit() {
      this.$refs.form.validate().then(valid => {
        this.surveyValid = valid;

        if (valid) {
          this.api.survey.submit(this.surveyData).then(() => this.isSubmitted = true);
        }
      });
    },
  },
};
</script>

<style scoped>

</style>
