<template>
  <div class="survey">
    <div class="survey-actions">
      <base-button v-tooltip content="Edit survey"
                   :action="editLink" size="medium" type="action" class="shadow-md" rounded
      >
        <base-icon name="pen"/>
      </base-button>

      <base-button v-tooltip content="Delete survey"
                   size="medium" type="danger" class="shadow-md" rounded
                   @click.native="requestSurveyRemoval"
      >
        <base-icon name="trash" fill="white"/>
      </base-button>
    </div>

    <div class="survey-header-title w-full">
      <div v-tooltip v-clipboard="accessLink"
           content="Sharing link (Click to copy)"
           class="survey-access-link w-52 text-center cursor-pointer"
      >
        {{ accessLink }}
      </div>

      <div class="survey-title h-12">
        {{ name.length > 60 ? `${name.substring(0, 60)}...` : name }}
      </div>
    </div>

    <div v-if="structure.inputs.length === 0" class="no-questions">
      <base-icon name="add-form"/>
      <p>Your questions will be here. <br>The form is now empty.</p>
    </div>

    <div v-else v-tooltip content="Survey mini-preview (first 3 questions)" class="questions flex flex-col w-full">
      <div v-for="question in structure.inputs.slice(0, 3)" :key="question.name" class="question">
        <p class="w-full truncate">{{ question.label }}</p>
      </div>
    </div>

    <div class="survey-footer">
      <base-switch v-tooltip :content="status === 'active' ? 'Survey is available' : 'Survey is not available'"
                   :value="status === 'active'" @input="onStatusChange"
      >
        <p class="text-base px-1 capitalize">{{ status }}</p>
      </base-switch>

      <a v-tooltip content="Total survey answers" :href="resultsLink" target="_blank" class="stats-link">
        <base-icon name="stats" fill="#29AD62"/>
        <p>{{ answersNumber }}</p>
        <base-icon name="person"/>
      </a>
    </div>

    <confirmation-modal ref="removalConfirmationModal" :name="`delete-survey-${this._uid}`"
                        confirm-text="Yes, delete" decline-text="No, cancel"
                        label="Confirm survey deletion"
                        description="Click yes to delete the survey"
    />
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
    accessLink: String,
    status: String,
    editLink: String,
    resultsLink: String,
  },
  emits: ['remove', 'change-status'],
  methods: {
    requestSurveyRemoval() {
      this.$refs.removalConfirmationModal.show().then(() => {
        this.$emit('remove');
      }).catch(() => {
      });
    },
    onStatusChange(val) {
      this.$emit('change-status', val ? 'active' : 'inactive');
    },
  },
};
</script>


<style lang="scss">
.survey {
  background: #FFFFFF;
  box-shadow: 0 20px 50px rgba(105, 99, 82, 0.15);
  border-radius: 20px;
  padding: 25px 25px 15px 25px;
  height: 415px;

  .survey-header-title {
    display: flex;
    flex-direction: column;
    margin: 0 0 15px 0;

    .survey-access-link {
      background: #F2EFE4;
      border: 1px dashed #D8D5CB;
      border-radius: 30px;
      padding: 5px 18px;
      font-size: 12px;
      font-weight: 300;
      line-height: 14px;
      color: #4F4F4F;
    }

    .survey-title {
      margin-top: 15px;
      font-size: 24px;
      line-height: 28px;
      color: #4F4F4F;
    }
  }

  .survey-actions {
    flex: 1;
    display: flex;
    flex-direction: row;
    justify-content: flex-end;

    button {
      margin: 0 0 0 8px;
    }

    &:after {
      margin: 10px;
    }
  }

  .questions {
    height: 150px;

    .question {
      background: #FFFFFF;
      box-shadow: 0 2px 15px rgba(85, 85, 85, 0.15);
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

  .no-questions {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 50%;

    p {
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      line-height: 24px;
      text-align: center;
      color: #BDBDBD;
    }
  }

  .survey-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 40px;

    .stats-link {
      display: flex;
      justify-content: center;
      align-items: center;

      * {
        margin-left: 15px;
      }
    }
  }
}

@media (max-width: 768px) {
  .survey {


    .survey-actions {

    }

    .access-link {
      width: 70%;
    }

    font-size: 10px;
    line-height: 11px;
    color: #4F4F4F;
  }
  .survey-title {

  }
  .no-questions {


    p {
      font-size: 10px;
      line-height: 14px;
    }
  }
  .questions {


    .question {
      font-size: 10px;
      line-height: 11px;

    }
  }
  .survey-footer {


    span {

    }

    div {

    }
  }
}

</style>
