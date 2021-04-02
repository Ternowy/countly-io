<template>
  <editor/>
</template>

<script>
import Editor from './survey-builder/Editor';
import survey from '../api/survey';
import { getAxios } from '../api/axios';

export default {
  name: 'SurveyBuilder',
  components: {Editor},
  props: {
    createSurveyUri: String
  },
  data() {
    const surveyApi = survey(getAxios(), {
      create: this.createSurveyUri
    });

    return {
      api: {
        survey: surveyApi
      }
    }
  },
  provide() {
    return {
      api: this.api
    }
  }
};
</script>

<style scoped>

</style>