<template>
  <base-modal v-bind="Object.assign({}, $attrs, $props)"
              classes="flex flex-col rounded-2xl bg-white justify-items-center pt-10 content-between"
              width="360px"
              height="187px"
  >
    <div class="w-full flex flex-row justify-center align-middle" style="height: 46px">
      <base-button type="light-danger" rounded>
        <base-icon name="alert" size="large" fill="#F95D51"/>
      </base-button>
      <p class="text-center">{{ label }}</p>
    </div>

    <div class="w-full text-center" style="height: 46px">
      {{ description }}
    </div>

    <div class="w-full flex flex-row border-t" style="height: 56px">
      <div class="w-6/12 text-center border-r content-center justify-center" @click="confirm">
        <p class="w-full h-full text-center">{{ confirmText }}</p>
      </div>
      <div class="w-6/12 text-center content-center justify-center" @click="decline">
        <p class="w-full h-full text-center">{{ declineText }}</p>
      </div>
    </div>
  </base-modal>
</template>

<script>
export default {
  name: 'ConfirmationModal',
  props: {
    name: String,
    label: {
      type: String,
      default: 'Are You sure?',
    },
    description: String,
    alert: Boolean,
    confirmText: {
      type: String,
      default: 'Yes',
    },
    declineText: {
      type: String,
      default: 'No',
    },
    hideOnDecline: {
      type: Boolean,
      default: true,
    },
    hideOnConfirm: {
      type: Boolean,
      default: true,
    },
  },
  data() {
    return {
      resolvePromise: null,
      rejectPromise: null,
    };
  },
  methods: {
    show() {
      this.$modal.show(this.name);

      return new Promise((resolve, reject) => {
        this.resolvePromise = () => {
          if (this.hideOnConfirm) {
            this.hide();
          }

          resolve();
        };
        this.rejectPromise = () => {
          if (this.hideOnDecline) {
            this.hide();
          }

          reject();
        };
      });
    },
    hide() {
      this.$modal.hide(this.name);
    },
    confirm() {
      this.resolvePromise();
    },
    decline() {
      this.rejectPromise();
    },
  },
};
</script>

<style lang="scss">
</style>