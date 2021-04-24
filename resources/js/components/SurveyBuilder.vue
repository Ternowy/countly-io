<template>
  <div>
    <confirmation-modal ref="exitConfirmationModal" name="exit-confirmation-modal"/>
    <base-header>
      <base-button v-if="homeUri" :disabled="updateStatus === 'saving'" @click.native="exit">
        <base-icon name="left-arrow"/>
        Back to home
      </base-button>

      <saving-status v-if="isEditMode" :status="updateStatus"/>

      <header-logo/>

      <base-button v-if="isEditMode" @click.native="onStats">
        <base-icon name="stats"/>
      </base-button>

      <base-button v-if="isEditMode" label="Share" @click.native="onShare"/>
      <base-button v-if="!isEditMode" label="Save" @click.native="onSave"/>

      <user-picture :src="userPic"/>
    </base-header>

    <editor ref="editor" :survey="survey" @input="onInput"/>
  </div>
</template>

<script>
import Editor from './survey-builder/Editor';
import survey from '../api/survey/survey.js';
import {getAxios} from '../api/axios';
import debounce from 'lodash/debounce.js';
import SavingStatus from './survey-builder/header/SavingStatus';

export default {
  name: 'SurveyBuilder',
  components: {SavingStatus, Editor},
  props: {
    createSurveyUri: String,
    updateSurveyUri: String,
    surveyStatsUri: String,
    surveySharingUri: String,
    homeUri: String,
    mode: {
      type: String,
      default: 'create',
      validate: (value) => ['create', 'edit'].includes(value),
    },
    userPic: String,
    survey: Object,
  },
  data() {
    const surveyApi = survey(getAxios(), {
      create: this.createSurveyUri,
      update: this.updateSurveyUri,
    });

    return {
      api: {
        survey: surveyApi,
      },
      updateStatus: 'saved',
    };
  },
  computed: {
    isEditMode() {
      return this.mode === 'edit';
    },
  },
  methods: {
    onInput(state) {
      if (this.isEditMode) {
        this.update(state);
      }
    },
    onSave() {
      this.create();
    },
    onShare() {
      window.open(this.surveySharingUri, '_blank');
    },
    onStats() {
      window.open(this.surveyStatsUri, '_blank');
    },
    setUpdateStatus(status) {
      this.updateStatus = status;
    },
    create() {
      this.api.survey.create(this.$refs.editor.getState());
    },
    update: debounce(function(state) {
      this.setUpdateStatus('saving');
      this.api.survey.update(state).finally(() => {
        this.setUpdateStatus('saved');
      });
    }, 500),
    exit() {
      if (!this.isEditMode) {
        this.$refs.exitConfirmationModal.show().then(() => {
          window.location.href = this.homeUri;
        }).catch(() => {});
      } else if(this.isEditMode) {
        window.location.href = this.homeUri;
      }
    },
  },
};
</script>

<style scoped>

</style>