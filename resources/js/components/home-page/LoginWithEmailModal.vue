<template>
  <confirmation-modal ref="loginWithEmailModal" name="login-with-email"
                      confirm-text="Send invitation link" decline-text="Cancel"
                      label="Email authorization"
                      :alert="false"
                      :disable-confirmation="!isEmailValid"
                      submit-on-enter
  >
    <template #description>
      <base-input name="email" ref="input" :input-classes="['text-center', 'p-5']"
                  placeholder="Your email"
                  v-bind="Object.assign({}, validationData)" v-model="email"
                  @input="onInput"
      />
    </template>
  </confirmation-modal>
</template>

<script>
export default {
  name: 'LoginWithEmailModal',
  data() {
    return {
      email: '',
      isEmailValid: false,
      validationData: {
        rules: {
          email: true,
        },
        rulesMessages: {
          email: 'Email is invalid',
        },
      },
    };
  },
  emits: ['input'],
  methods: {
    open() {
      this.$refs.loginWithEmailModal.show().then(() => {
        this.$emit('input', this.email);
      });
    },
    onInput() {
      this.$refs.input.validate().then(({valid}) => {
        this.isEmailValid = valid;
      });
    },
    onEnter() {
      debugger
      this.$refs.loginWithEmailModal.confirm();
    }
  },
};
</script>

<style scoped>

</style>