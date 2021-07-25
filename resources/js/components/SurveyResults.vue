<template>
  <div class="container">
    <div class="grid md:grid-cols-2 xsm:grid-cols-1 gap-4 mt-10 pb-32">
      <result-chart v-for="(result, index) in Object.values(results)" :key="index" v-bind="result"/>
    </div>
    <base-button v-tooltip type="danger" fixed content="Delete all answers to free place in the database"
                 @click.native="onClearData" :disabled="totalAnswers === 0"
    >
      Clear collected data
    </base-button>
    <confirmation-modal ref="cleanupConfirmationModal" name="cleanup-confirmation-modal"
                        confirm-text="Yes, delete" decline-text="No, cancel"
                        label="Confirm data deletion"
                        description="Confirming this action, You will clear all responses for current survey"
    />
  </div>
</template>

<script>
import ResultChart from './survey-results/ResultChart';
import survey from '../api/survey/survey';
import {getAxios} from '../api/axios';

export default {
  name: 'SurveyResults',
  components: {ResultChart},
  props: {
    results: Object,
    totalAnswers: Number,
    survey: Object,
  },
  data() {
    const surveyApi = survey(getAxios(), {});

    return {
      api: {
        survey: surveyApi,
      },
    };
  },
  methods: {
    onClearData() {
      this.$refs.cleanupConfirmationModal.show().then(this.clearData);
    },
    clearData() {
      this.$eventBus.$emit(this.$eventBusEvents.LOADING);
      this.api.survey.clearResults(this.survey.clearResultsLink).
          then(() => {
            location.reload();
          }).
          finally(() => this.$eventBus.$emit(this.$eventBusEvents.LOADED));
    },
  },
};
</script>

<style scoped>

</style>