<template>
  <success-window v-if="isSubmitted"/>
  <preview v-else ref="form" @submit.prevent="onSubmit">
    <preview-survey-description :name="name" :description="description"/>
    <preview-input v-for="(input, index) in structure" :key="index" v-bind="input"
                   v-model="surveyData[input.name]" @input="onInput"
    />
    <base-button :disabled="!surveyValid" type="action" class="w-36" @click="onSubmit">
      <p class="text-base text-white text-lg font-medium">🖐 Submit</p>
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
      isSubmitted: false
    };
  },
  created() {
    this.structure.forEach(({name, type}) => {
      this.$set(this.surveyData, name, type === 'checkbox' ? [] : null);
    });
  },
  methods: {
    onInput() {
      this.$nextTick(
          () => this.$refs.form.validate().then(valid => {
            this.surveyValid = valid;
            console.log(valid)
          })
      );
    },
    onSubmit() {
      this.api.survey.submit(this.surveyData).then(() => this.isSubmitted = true);
    },
  },
};
</script>

<style scoped>

</style>
