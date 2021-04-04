<template>
  <div>
    {{ name }}
    {{ status }}
    {{ accessLink }}
    <a :href="editLink">Edit</a>
    <button @click="showRemovalConfirmation">Delete</button>
    <confirmation-modal name="delete-survey" @confirm="remove" @decline="hideRemovalConfirmation"/>
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
  methods: {
    showRemovalConfirmation() {
      debugger
      this.$modal.show('delete-survey');
    },
    hideRemovalConfirmation() {
      this.$modal.hide('delete-survey');
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