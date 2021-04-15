<template>
    <div class="survey-list-wrapper">
        <div class="ci-container">
            <div class="survey-list">
                <survey v-for="(survey, index) in surveys" :key="`survey-${index}`" v-bind="survey"
                        @remove="deleteSurvey(survey.removeLink, index)"
                />
                <create-survey-c-t-a v-for="n in ctaNumber" :key="n" :action="createSurveyLink"/>
            </div>
            <div class="create-survey-btn">
                <BaseButton :link="createSurveyLink" label="Create new survey" color="white" rounded shadow="green">
                    <BaseIcon :height="14" :width="14" class="ci-mr-10" slot="pre-icon" :fill="variables.white"
                              icon="plus"/>
                </BaseButton>
            </div>
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
            default: 5
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
    },
};
</script>

<style lang="scss" scoped>
.survey-list-wrapper {
    background-color: #F2EFE4;
    padding: 150px 0  60px 0;

    .survey-list {
        display: grid;
        grid-gap: 40px;
        grid-template-columns: 1fr 1fr 1fr;
        @media (max-width: 991px) {
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
    }
}
 @media (max-width: 768px){
     .survey-list-wrapper{
         padding: 61px 0  60px 0;
         .create-survey-btn{
             right:50%;
             transform: translateX(50%);
             bottom: 40px;
             width: 227px;
             border-radius: 50px;
         }
     }
 }
</style>
