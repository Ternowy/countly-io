<template>
  <base-modal v-bind="Object.assign({}, $attrs, $props)"
              classes="flex flex-col rounded-2xl bg-white justify-items-center pt-5 content-between place-content-between"
              width="360px"
              :height="modalHeight"
  >
    <div class="w-full flex flex-row justify-center items-center px-4 pt-2" style="height: 60px">
      <base-button v-if="alert" type="light-danger" rounded>
        <base-icon name="alert" size="large" fill="#F95D51"/>
      </base-button>
      <p class="ml-2 text-center">{{ label }}</p>
    </div>

    <slot name="description">
      <div v-if="description" class="w-full flex py-2 text-center items-center justify-center font-normal"
           style="height: 60px">
        {{ description }}
      </div>
    </slot>

    <div class="w-full flex flex-row border-t cursor-pointer" style="height: 60px">
      <modal-button class="text-gray-500 border-r" :text="declineText" @action="decline"/>
      <modal-button :text="confirmText" :disabled="disableConfirmation" @action="confirm"/>
    </div>
  </base-modal>
</template>

<script>
import ModalButton from './modal/ModalButton';

export default {
  name: 'ConfirmationModal',
  components: {ModalButton},
  props: {
    name: String,
    label: {
      type: String,
      default: 'Are You sure?',
    },
    description: String,
    alert: {
      type: Boolean,
      default: true,
    },
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
    disableConfirmation: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      resolvePromise: null,
      rejectPromise: null,
    };
  },
  computed: {
    modalHeight() {
      return this.description ? '240px' : '180px';
    },
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
      if (!this.disableConfirmation) {
        this.resolvePromise();
      }
    },
    decline() {
      this.rejectPromise();
    },
  },
};
</script>

<style lang="scss">
</style>