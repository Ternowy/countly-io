<template>
  <div class="container">
    <div class="w-full flex justify-center align-middle items-center mb-2 mt-10">
      <base-button v-if="totalAnswers > 0"
                   v-tooltip type="passive" content="Open answer per row table" class="text-black"
                   @click.native="switchPresentation"
      >
        <p class="px-12 text-grey flex">{{ presentedAsTable ? 'Graphs' : 'All answers'}}</p>
      </base-button>
    </div>

    <div class="mt-10 pb-32">
      <div v-if="presentedAsTable" class="w-full flex">
        <results-table :data="reactiveRawSurveyAnswers" :structure="results" :can-load-next-page="canLoadMoreAnswers"
                       @update="onTableUpdate"
        />
      </div>
      <div v-else class="grid md:grid-cols-2 xsm:grid-cols-1 gap-4">
        <result-chart v-for="(result, index) in Object.values(results)" :key="index" v-bind="result"/>
      </div>
    </div>
    <base-button v-tooltip type="danger" fixed content="Delete all answers to free place in the database"
                 @click.native="onClearData" :disabled="totalAnswers === 0"
    >
      Clear collected answers
    </base-button>
    <confirmation-modal ref="cleanupConfirmationModal" name="cleanup-confirmation-modal"
                        confirm-text="Yes, delete" decline-text="No, cancel"
                        label="Confirm data deletion"
                        description="Confirming this action, You will clear all responses for current survey"
    />
  </div>
</template>

<script>
import ResultChart from './survey-results/ResultChart'
import survey from '../api/survey/survey'
import { getAxios } from '../api/axios'
import ResultsTable from './survey-results/ResultsTable'
import TableDataFormatter from '../service/table-data-formatter.js'

export default {
  name: 'SurveyResults',
  components: { ResultsTable, ResultChart },
  props: {
    results: Object,
    totalAnswers: Number,
    survey: Object,
  },
  data () {
    const surveyApi = survey(getAxios(), { answersList: this.survey.surveyAnswersList })

    return {
      presentedAsTable: false,
      rawSurveyAnswers: [],
      canLoadMoreAnswers: false,
      api: {
        survey: surveyApi,
      },
    }
  },
  computed: {
    reactiveRawSurveyAnswers () {
      return this.rawSurveyAnswers
    },
  },
  methods: {
    onClearData () {
      this.$refs.cleanupConfirmationModal.show().then(this.clearData)
    },
    clearData () {
      this.$eventBus.$emit(this.$eventBusEvents.LOADING)
      this.api.survey.clearResults(this.survey.clearResultsLink).
          then(() => {
            location.reload()
          }).
          finally(() => this.$eventBus.$emit(this.$eventBusEvents.LOADED))
    },
    switchPresentation () {
      this.presentedAsTable = !this.presentedAsTable
    },
    onTableUpdate (page = 1) {
      this.$eventBus.$emit(this.$eventBusEvents.LOADING)
      this.api.survey.loadResults(page).then(({ data, next_page_url }) => {
        this.rawSurveyAnswers = [...this.rawSurveyAnswers, ...TableDataFormatter.formatData(data, this.results)]
        this.canLoadMoreAnswers = !!(next_page_url);
      }).finally(() => this.$eventBus.$emit(this.$eventBusEvents.LOADED))
    },
  },
}
</script>

<style scoped>

</style>