<template>
  <div style="padding: 20px">
    {{ name }}
    {{ status }}
    {{ accessLink }}
    <a :href="editLink">Edit</a>
    <button @click="showRemovalConfirmation">Delete</button>
    <confirmation-modal :name="removalModalName" @confirm="remove" @decline="hideRemovalConfirmation"/>
  </div>
</template>

<script>
export default {
  name: 'Survey',
  props: {
    name: String,
    description: String,
    structure: Array,
    accessLink: String,
    status: String,
    editLink: String,
  },
  emits: ['remove'],
  data() {
    return {
      removalModalName: `delete-survey-${this._uid}`
    }
  },
  methods: {
    showRemovalConfirmation() {
      this.$modal.show(this.removalModalName);
    },
    hideRemovalConfirmation() {
      this.$modal.hide(this.removalModalName);
    },
    remove() {
      this.hideRemovalConfirmation();
      this.$emit('remove');
    },
  },
};
</script>

<style scoped>

</style>