<template>
  <div>
    <base-input v-model="name"/>
    <base-input v-model="description"/>
  </div>
</template>

<script>
export default {
  name: 'EditorPreviewSurveyDescription',
  props: {
    value: Object,
  },
  emits: ['input'],
  computed: {
    name: {
      get() {
        return this.value.name;
      },
      set(name) {
        this.$emit('input', Object.assign({}, this.value, {name}));
      },
    },
    description: {
      get() {
        return this.value.description;
      },
      set(description) {
        this.$emit('input', Object.assign({}, this.value, {description}));
      },
    },
  },
};
</script>

<style scoped>

</style>