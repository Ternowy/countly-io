<template>
  <div>
    <survey v-for="(survey, index) in surveys" :key="`survey-${index}`" v-bind="survey"
            @remove="deleteSurvey(survey, index)"
    />
    <create-survey-c-t-a v-for="n in ctaNumber" :key="n" :action="createSurveyLink"/>
  </div>
</template>

<script>
import survey from '../api/survey/survey.js';
import {getAxios} from '../api/axios';
import Survey from './survey-list/Survey';
import CreateSurveyCTA from './survey-list/CreateSurveyCTA';

export default {
  name: 'SurveyList',
  components: {CreateSurveyCTA, Survey},
  props: {
    surveyList: Array,
    createSurveyLink: {
      type: String,
      required: true,
    },
    maxSurveys: {
      type: Number,
      default: 5
    },
  },
  data() {
    const surveyApi = survey(getAxios(), {});

    return {
      api: {
        survey: surveyApi,
      },
      surveys: [],
    };
  },
  computed: {
    ctaNumber() {
      const ctaNumber = this.maxSurveys - this.surveys.length;

      return ctaNumber < 0 ? 0 : ctaNumber;
    },
  },
  created() {
    this.surveys = this.surveyList;
  },
  methods: {
    deleteSurvey({removeLink}, index) {
      debugger
      this.api.survey.delete(removeLink).then(() => {
        this.surveys.splice(index, 1);
      });
    },
  },
};
</script>

<style scoped>

</style>