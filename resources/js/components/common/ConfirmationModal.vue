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
      default: 'yes'
    },
    declineText: {
      type: String,
      default: 'no'
    },
  },
  emits: ['confirm', 'decline'],
  methods: {
    confirm() {
      this.$emit('confirm');
    },
    decline() {
      this.$emit('decline');
    },
  },
};
</script>

<style scoped>

</style>