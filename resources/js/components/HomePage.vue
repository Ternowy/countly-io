<template>
  <div class="flex w-full flex-col justify-center content-center items-center">
    <div class="flex flex-col lg:w-4/12 md:w-full items-center">
      <header-logo :src="logo"/>
      <div>
        <p>Surveys for communities 🌍</p>
      </div>
      <div>
        <p>Join for free to create surveys with up to 5000 records</p>
      </div>
      <div v-if="isAuthenticated">
        <base-button type="action" class="px-16 mt-5" :action="surveysLink">
          Your surveys
        </base-button>
        <base-button type="danger" class="px-16 mt-5" :action="logoutLink">
          Logout
        </base-button>
      </div>
      <div v-else>
        <base-button type="classic" class="px-16 mt-5" :action="googleLink">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M21.8055 10.0415H21V10H12V14H17.6515C16.827 16.3285 14.6115 18 12 18C8.6865 18 6 15.3135 6 12C6 8.6865 8.6865 6 12 6C13.5295 6 14.921 6.577 15.9805 7.5195L18.809 4.691C17.023 3.0265 14.634 2 12 2C6.4775 2 2 6.4775 2 12C2 17.5225 6.4775 22 12 22C17.5225 22 22 17.5225 22 12C22 11.3295 21.931 10.675 21.8055 10.0415Z"
                fill="#FFC107"/>
            <path
                d="M3.15295 7.3455L6.43845 9.755C7.32745 7.554 9.48045 6 12 6C13.5295 6 14.921 6.577 15.9805 7.5195L18.809 4.691C17.023 3.0265 14.634 2 12 2C8.15895 2 4.82795 4.1685 3.15295 7.3455Z"
                fill="#FF3D00"/>
            <path
                d="M12 22.0001C14.583 22.0001 16.93 21.0116 18.7045 19.4041L15.6095 16.7851C14.5718 17.5743 13.3038 18.0011 12 18.0001C9.39903 18.0001 7.19053 16.3416 6.35853 14.0271L3.09753 16.5396C4.75253 19.7781 8.11353 22.0001 12 22.0001Z"
                fill="#4CAF50"/>
            <path
                d="M21.8055 10.0415H21V10H12V14H17.6515C17.2571 15.1082 16.5467 16.0766 15.608 16.7855L15.6095 16.7845L18.7045 19.4035C18.4855 19.6025 22 17 22 12C22 11.3295 21.931 10.675 21.8055 10.0415Z"
                fill="#1976D2"/>
          </svg>
          <p class="ml-2.5 text-grey font-normal text-lg">Continue with Google</p>
        </base-button>
        <base-button type="classic" class="px-16 mt-5" :action="facebookLink" style="background-color: #3B5998">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M15.725 22V14.255H18.325L18.714 11.237H15.724V9.31C15.724 8.436 15.967 7.84 17.221 7.84H18.819V5.14C18.0451 5.05764 17.2673 5.01758 16.489 5.02C14.185 5.02 12.608 6.427 12.608 9.01V11.237H10V14.255H12.607V22H3.104C2.494 22 2 21.506 2 20.896V3.104C2 2.494 2.494 2 3.104 2H20.896C21.506 2 22 2.494 22 3.104V20.896C22 21.506 21.506 22 20.896 22H15.725Z"
                  fill="white"/>
          </svg>
          <p class="ml-2.5 text-white font-normal text-lg">Continue with Facebook</p>
        </base-button>
        <base-button type="passive" class="px-16 mt-5 w-full" @click.native="onLoginWithEmail">
          <base-icon name="letter" size="large"/>
          <p class="ml-2.5 text-grey font-normal text-lg">Continue with email</p>
        </base-button>
        <login-with-email-modal ref="loginWithEmailModal" @input="onEmailSubmit"/>
      </div>
      <div class="w-full text-center border-b mt-6 mr-0 border-gray-400" style="color: #949087">
        <span class="py-0 px-2.5 text-xl bg-main" style="line-height: 0.1em;">or</span>
      </div>
      <div class="flex flex-col mt-5 md:w-8/12 sm:w-full">
        <p class="text-lg text-grey text-center font-normal mb-2">Join survey by code</p>
        <join-survey ref="joinSurveyInput" @input="onSurveyCodeInput" @submit="onJoinSurvey"/>
        <p v-if="surveyCodeError" class="text-lg text-red-600 text-center font-normal mt-1">
          {{ surveyCodeError }}
        </p>
      </div>
    </div>
    <div class="w-full grid md:grid-cols-2 sm:grid-cols-1 mt-8 mb-8">
      <div class="flex flex-col px-5">
        <p class="font-normal text-3xl text-grey text-center my-8">How survey looks like?</p>
        <survey-preview v-bind="welcomeSurvey"/>
      </div>
      <div class="flex flex-col px-5">
        <p class="font-normal text-3xl text-grey text-center my-8">How results look like?</p>
        <result-chart v-for="(result, index) in Object.values(welcomeSurveyResults)" :key="index"
                      v-bind="result" class="mb-8"
        />
      </div>
    </div>
  </div>
</template>

<script>
import JoinSurvey from './home-page/JoinSurvey';
import survey from '../api/survey/survey.js';
import auth from '../api/auth/auth.js';
import ResultChart from './survey-results/ResultChart';
import {getAxios} from '../api/axios';
import LoginWithEmailModal from './home-page/LoginWithEmailModal';

export default {
  name: 'HomePage',
  components: {LoginWithEmailModal, JoinSurvey, ResultChart},
  props: {
    googleLink: {
      type: String,
      required: true,
    },
    facebookLink: {
      type: String,
      required: true,
    },
    logoutLink: {
      type: String,
      required: true,
    },
    surveysLink: {
      type: String,
      required: true,
    },
    emailsAuthLink: {
      type: String,
      required: true,
    },
    welcomeSurvey: Object,
    welcomeSurveyResults: Object,
    isAuthenticated: Boolean,
    logo: String,
  },
  data() {
    const surveyApi = survey(getAxios());
    const authApi = auth(getAxios(), {emailAuth: this.emailsAuthLink});

    return {
      api: {
        survey: surveyApi,
        auth: authApi,
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
    onLoginWithEmail() {
      this.$refs.loginWithEmailModal.open();
    },
    onEmailSubmit(email) {
      this.api.auth.requestEmailAuth(email).then(() => {
        alert('Login link sent');
      })
    },
  },
};
</script>
