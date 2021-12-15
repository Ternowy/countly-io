<template>
  <div class="flex flex-row w-full pl-4 rounded-full border border-r-0"
       style="background-color: #FAF7EC"
  >
    <input v-model="joinSurveyCode" type="password"
           name="code" class="flex w-8/12 bg-transparent" maxlength="6" 
           @input="onInput"
    >
    <div class="w-4/12 text-center px-2 py-2 rounded-r-full text-white font-medium text-xl cursor-pointer"
         :style="joinButtonStyle"
         @click="onSubmit"
    >
      Join
    </div>
  </div>
</template>

<script>
export default {
  name: 'JoinSurvey',
  emits: ['input', 'submit'],
  data() {
    return {
      joinSurveyCode: '',
    }
  },
  computed: {
    joinButtonStyle() {
      return {
        'background-color': this.joinSurveyCode ? '#F3BD33' : '#828282'
      }
    }
  },
  methods: {
    onInput(val) {
      this.$emit('input', val);
    },
    onSubmit() {
      this.$emit('submit', this.joinSurveyCode);
    }
  },
};
</script>