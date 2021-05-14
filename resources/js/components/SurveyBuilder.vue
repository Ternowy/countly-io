<template>
  <div class="builder">
    <confirmation-modal ref="exitConfirmationModal" name="exit-confirmation-modal"/>
    <base-header :logo="logo">
      <template #info>
        <base-button v-if="homeUri" :disabled="updateStatus === 'saving'" type="passive" class="exit-button" @click.native="exit">
          <base-icon name="left-arrow"/>
          <p class="exit">Back to home</p>
        </base-button>

        <saving-status v-if="isEditMode" :status="updateStatus" class="ml-8"/>
      </template>

      <template #actions>
        <base-button v-if="isEditMode" type="action" rounded @click.native="onStats">
          <base-icon name="stats" fill="#fff"/>
        </base-button>

        <base-button v-if="isEditMode" type="action" class="w-36 mx-4" @click.native="onShare">
          <p class="text-center text-lg text-white">Share</p>
        </base-button>

        <base-button v-if="!isEditMode" type="action" class="w-36 mx-4" @click.native="onSave">
          <p class="text-center text-lg text-white">Save</p>
        </base-button>

        <user-picture :src="userPic"/>
      </template>
    </base-header>

    <editor ref="editor" :survey="survey" :is-editing="isEditMode" @input="onInput"/>
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
    logo: String
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

<style lang="scss" scoped>
.builder {
  .exit-button {
    height: 56px;
    width: 228px;
    border-radius: 50px;
    color: #696352;
    display: flex;
    justify-content: space-evenly;
    padding: 0 25px;
  }

  .save-button {
    height: 56px;
    width: 159px;
    border-radius: 50px;
  }
}
</style>
