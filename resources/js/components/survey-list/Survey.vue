<template>
    <div class="survey">

        <div class="survey-actions" :class="{active:actions}">
            <BaseButton class="dots" icon rounded :background="variables.white" @clicked="toggleActions" >
                <BaseIcon slot="pre-icon" icon="dots" :fill="variables.dark_grey" />
            </BaseButton>
            <BaseButton class="action" icon rounded shadow="green" :link="editLink">
                <BaseIcon slot="pre-icon" :fill="variables.white" icon="pen"/>
            </BaseButton>
            <BaseButton class="action" icon rounded shadow="red" background="red" @clicked="requestSurveyRemoval">
                <BaseIcon slot="pre-icon" :fill="variables.red" icon="trash"/>
            </BaseButton>
        </div>

        <div class="access-link">
            survey.contly.io/{{ accessLink }}
        </div>
        <div class="survey-title">
            {{ name }}
        </div>
        <div class="no-questions" v-if="structure.length===0">
            <BaseIcon class="form-icon"  icon="form" fill="grey"/>
            <p>Your questions will be here. <br>
                The form is now empty.</p>
        </div>
        <div class="questions">

            <div class="question" v-for="(question, index) in structure.slice(0, 3)" :key="question.name">
                {{ index + 1 }}.{{ question.label }}
            </div>
        </div>
        <div class="survey-foot">
            <BaseInteractiveButton @changed="changeStatus" :value="temp" background="green">
                    {{status}}
            </BaseInteractiveButton>
            <div>
                <BaseButton icon :link="resultsLink" :background="variables.white">
                    <BaseIcon slot="pre-icon" icon="chart" fill="green"/>
                </BaseButton>
                <BaseButton icon :link="resultsLink" :background="variables.white">
                    <span slot="text">{{ answersNumber }}</span>
                    <BaseIcon slot="post-icon" class="ci-ml-5" icon="person" fill="dark-grey"/>
                </BaseButton>
            </div>
        </div>

        <confirmation-modal ref="removalConfirmationModal" :name="`delete-survey-${this._uid}`"/>
        <div class="backdrop" v-if="actions" @click="toggleActions"></div>
    </div>
</template>

<script>
export default {
    name: 'Survey',
    props: {
        name: String,
        description: String,
        structure: Array,
        answersNumber: Number,
        //it is OK to recieve only code here//use surveys.laravel.test/CODE to access the survey
        accessLink: String,
        status: String,
        editLink: String,
        resultsLink: String,

    },
    emits: ['remove'],
    data(){
        return{
            actions: false,
            temp:this.status==='active' //JUST FOR TESTING PURPOSE
        }
    },
    methods: {
        requestSurveyRemoval() {
            this.$refs.removalConfirmationModal.show().then(() => {
                this.$emit('remove');
            }).catch(() => {
            });
        },
        changeStatus() {
            this.temp = !this.temp
        },
        toggleActions(){
            this.actions= !this.actions
        }
    },
};
</script>

<style lang="scss" scoped>
.survey {
    background: #FFFFFF;
    box-shadow: 0px 20px 50px rgba(105, 99, 82, 0.15);
    border-radius: 20px;
    position: relative;
    padding: 78px 50px 52px 50px;

    &:before {
        position: absolute;
        content: '';

        border-radius: 20px 0px 0px 20px;
        width: 15px;
        height: 100%;
        top: 0;
        left: 0;
    }

    &:nth-child(5n-4):before {
        background: #F3BD33;
    }

    &:nth-child(5n-3):before {
        background: #9051E0;
    }

    &:nth-child(5n-2):before {
        background: #2EAAE8;
    }

    &:nth-child(5n-1):before {
        background: #F95D51;
    }

    &:nth-child(5n):before {
        background: #6BE2A4;
    }

    .survey-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        column-gap: 10px;
        position: absolute;
        top: 20px;
        right: 25px;
        .dots{
            display: none;
        }
    }

    .access-link {
        background: #F2EFE4;
        border: 1px dashed #D8D5CB;
        border-radius: 30px;
        padding: 5px 18px;
        display: inline-block;
        font-size: 12px;
        line-height: 14px;
        color: #4F4F4F;

    }

    .survey-title {
        margin-top: 10px;
        font-size: 24px;
        line-height: 28px;
        color: #4F4F4F;
    }

    .no-questions {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 80%;
        row-gap: 18px;

        p {
            font-style: normal;
            font-weight: normal;
            font-size: 16px;
            line-height: 24px;
            text-align: center;
            color: #BDBDBD;
        }
    }

    .questions {
        //height: 80%;
        padding-top: 25px;

        .question {
            background: #FFFFFF;
            box-shadow: 0px 2px 15px rgba(85, 85, 85, 0.15);
            border-radius: 6px;
            font-weight: normal;
            font-size: 16px;
            line-height: 18px;
            color: #333333;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            padding: 11px 20px;
        }
    }

    .survey-foot {
        position: absolute;
        left: 50px;
        right: 50px;
        bottom: 54px;
        display: flex;
        justify-content: space-between;
        align-items: center;

        span {
            font-weight: 300;
            font-size: 14px;
            line-height: 16px;
            color: #828282;
            text-decoration: none;
        }

        div {
            display: flex;

            align-items: center;
        }

    }
}
@media (max-width: 768px) {
    .survey {
        border-radius: 12px;
        position: relative;
        padding: 30px 20px 60px 20px;
        &:before {
            border-radius: 150px 0px 0px 15px;
            width: 6px;
        }
        .survey-actions {
            .dots {
                display: block;
            }
            .action{
                display: none;
                position: absolute;
                z-index:9;
                &:nth-child(2) {
                    transform: translateX(-110%);
                }
                &:nth-child(3) {
                    transform: translateY(110%);
                }
            }
            &.active {
                .action{
                    display: block;
                }
            }
        }
        .survey-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: 10px;
            position: absolute;
            top: 20px;
            right: 25px;
        }

        .access-link {
            font-size: 10px;
            line-height: 11px;
            color: #4F4F4F;
        }

        .survey-title {
            font-size: 24px;
            line-height: 28px;

        }

        .no-questions {
            height: 110px;
            p {
                font-size: 10px;
                line-height: 14px;
            }
        }

        .questions {
            height: 110px;
            padding-top: 15px;

            .question {
                font-size: 10px;
                line-height: 11px;
                padding: 7px 11px;
                margin-bottom: 11px;
            }
        }

        .survey-foot {
            position: absolute;
            left: 20px;
            right: 20px;
            bottom: 20px;
            span {
                font-weight: 300;
                font-size: 14px;
                line-height: 16px;
                color: #828282;
                text-decoration: none;
            }

            div {
                display: flex;

                align-items: center;
            }

        }
    }
}
</style>
