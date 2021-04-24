<template>
  <div class="survey-list-wrapper p-app">
    <div class="survey-list">
      <survey v-for="(survey, index) in surveys" :key="`survey-${index}`" v-bind="survey"
              @remove="deleteSurvey(survey.removeLink, index)"
              @change-status="updateStatus(survey.updateStatusLink, index, $event)"
      />
      <create-survey-c-t-a v-for="n in ctaNumber" :key="n" :action="createSurveyLink"/>
      <base-button class="create-survey-btn" type="action" :action="createSurveyLink">
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
    display: grid;
    grid-gap: 40px;
    grid-template-columns: 1fr 1fr 1fr;
    @media (max-width: 1024px) {
      grid-template-columns: 1fr 1fr;
    }
    @media (max-width: 600px) {
      grid-template-columns: 1fr;
    }
  }

  .create-survey-btn {
    position: fixed;
    right: 7%;
    bottom: 60px;
    width: 264px;
    border-radius: 50px;
  }
}

@media (max-width: 768px) {
  .survey-list-wrapper {
    .create-survey-btn {
      right: 50%;
      transform: translateX(50%);
      bottom: 40px;
      width: 227px;
      border-radius: 50px;
    }
  }
}
</style>