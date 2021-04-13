<template>
  <div style="padding: 20px">
    {{ name }}
    {{ status }}
    {{ accessLink }}
    <a :href="editLink">Edit</a>
    <a :href="resultsLink" target="_blank">Results</a>
    <button @click="requestSurveyRemoval">Delete</button>
    <confirmation-modal ref="removalConfirmationModal" :name="`delete-survey-${this._uid}`"/>
  </div>
</template>

<script>
export default {
  name: 'Survey',
  props: {
    name: String,
    description: String,
    structure: Array,
    accessLink: String,
    status: String,
    editLink: String,
    resultsLink: String,
  },
  emits: ['remove'],
  methods: {
    requestSurveyRemoval() {
      this.$refs.removalConfirmationModal.show().then(() => {
        this.$emit('remove');
      }).catch(() => {});
    },
  },
};
</script>

<style scoped>

</style>