<template>
  <base-modal v-bind="Object.assign({}, $attrs, $props)">
    <base-icon v-if="alert" name="alert"/>
    {{ label }}
    {{ description }}
    <div @click="confirm">{{ confirmText }}</div>
    <div @click="decline">{{ declineText }}</div>
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
      default: 'Yes'
    },
    declineText: {
      type: String,
      default: 'No'
    },
    hideOnDecline: {
      type: Boolean,
      default: true
    }
  },
  data() {
    return {
      resolvePromise: null,
      rejectPromise: null
    }
  },
  methods: {
    show() {
      this.$modal.show(this.name);
      
      return new Promise((resolve, reject) => {
        this.resolvePromise = () => resolve();
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

<style scoped>

</style>