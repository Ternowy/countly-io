<template>
  <div class="survey-list-wrapper p-app">
    <div class="survey-list grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-5">
      <survey v-for="(survey, index) in surveys" :key="`survey-${index}`" v-bind="survey"
              @remove="deleteSurvey(survey.removeLink, index)"
              @change-status="updateStatus(survey.updateStatusLink, index, $event)"
      />
      <create-survey-c-t-a v-for="n in ctaNumber" :key="n" :action="createSurveyLink"/>
      <base-button v-tooltip content="Open survey builder" class="shadow-lg" type="action" rounded fixed
                   :action="createSurveyLink"
      >
        <p style="font-size: 28px; margin-right: 5px">+</p> Create new survey
      </base-button>
    </div>
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
      default: 5,
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
    deleteSurvey(endpoint, index) {
      this.api.survey.delete(endpoint).then(() => {
        this.surveys.splice(index, 1);
      });
    },
    updateStatus(endpoint, index, status) {
      this.api.survey.updateStatus(endpoint, status).then((data) => {
        this.surveys.splice(index, 1, data);
      });
    }
  },
};
</script>

<style lang="scss" scoped>
.survey-list-wrapper {
  background-color: #F2EFE4;

  .survey-list {
    padding: 50px 0 50px 0;
  }
}


</style>
