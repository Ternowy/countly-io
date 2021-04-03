<template>
  <div>
    <header>
      <base-button v-if="homeUri" @click.native="quit">
        <base-icon name="left-arrow"/> Back to home
      </base-button>
      <saving-status :status="updateStatus"/>
      <header-logo/>
      {{ isEditMode ? '- STATS - SHARING' : '' }}
      <base-button v-if="!isEditMode" label="save" @click.native="onSave"/>
      <header-user-picture :src="userPic"/>
    </header>
    <editor ref="editor" @input="onInput"/>
  </div>
</template>

<script>
import Editor from './survey-builder/Editor';
import survey from '../api/survey';
import {getAxios} from '../api/axios';
import debounce from 'lodash/debounce.js';
import SavingStatus from './survey-builder/header/SavingStatus';

export default {
  name: 'SurveyBuilder',
  components: {SavingStatus, Editor},
  props: {
    createSurveyUri: String,
    updateSurveyUri: String,
    homeUri: String,
    mode: {
      type: String,
      default: 'create',
      validate: (value) => ['create', 'edit'].includes(value),
    },
    userPic: String
  },
  data() {
    const surveyApi = survey(getAxios(), {
      create: this.createSurveyUri,
      update: this.updateSurveyUri
    });

    return {
      api: {
        survey: surveyApi,
      },
      updateStatus: 'saved'
    };
  },
  computed: {
    isEditMode() {
      return this.mode === 'edit';
    }
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
    setUpdateStatus(status) {
      this.updateStatus = status;
    },
    create() {
      this.api.survey.create(this.$refs.editor.getState());
    },
    update: debounce(function(state) {
      this.setUpdateStatus('saving');

      this.api.survey.create(state).finally(() => {
        this.setUpdateStatus('saved');
      });
    }, 1000),
    quit() {
      if (!this.isEditMode) {
        window.location.href = this.homeUri;
      }
    },
  },
};
</script>

<style scoped>

</style>