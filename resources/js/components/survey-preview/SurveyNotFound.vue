<template>
  <div class="flex flex-col items-center" style="margin-top: 20%">
    <h1 class="text-4xl font-Ubuntu font-medium text-brown text-center">404</h1>
    <h2 class="text-2xl font-Ubuntu font-light text-brown mt-5 mb-10 text-center">Survey not found</h2>
    <div class="flex flex-col xsm:w-full md:w-6/12 lg:w-3/12 justify-center items-center">
      <div class="flex flex-col mt-5 md:w-8/12 sm:w-full">
        <p class="text-lg text-grey text-center font-normal mb-2">Join survey by code</p>
        <join-survey ref="joinSurveyInput" @input="onSurveyCodeInput" @submit="onJoinSurvey"/>
        <p v-if="surveyCodeError" class="text-lg text-red-600 text-center font-normal mt-1">
          {{ surveyCodeError }}
        </p>
      </div>
      <div class="w-full text-center border-b mt-6 mr-0 border-gray-400 mb-10" style="color: #949087">
        <span class="py-0 px-2.5 text-xl bg-main" style="line-height: 0.1em;">You can also</span>
      </div>
      <base-button class="p-5 leading-6" type="action" :action="link">
        ✌️ Create survey
      </base-button>
    </div>
  </div>
</template>

<script>
import survey from '../../api/survey/survey';
import {getAxios} from '../../api/axios';
import JoinSurvey from '../home-page/JoinSurvey';

export default {
  name: 'SuccessWindow',
  components: {JoinSurvey},
  props: {
    link: String,
  },
  data() {
    const surveyApi = survey(getAxios());

    return {
      api: {
        survey: surveyApi,
      },
      surveyCodeError: null,
    };
  },
  methods: {
    onSurveyCodeInput() {
      this.surveyCodeError = null;
    },
    onJoinSurvey(code) {
      this.api.survey.join(code).then(({accessLink}) => {
        window.location.href = accessLink;
      }).catch(() => {
        this.surveyCodeError = 'Survey doesn\'t exists or is not available';
      });
    },
  },
};
</script>

<style scoped>

</style>