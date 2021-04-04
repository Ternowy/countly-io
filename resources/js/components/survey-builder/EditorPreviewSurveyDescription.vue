<template>
  <div>
    <base-input v-model="name" :maxlength="100" @blur="onNameBlur"/>
    <base-input v-model="description" :maxlength="280" @blur="onDescriptionBlur"/>
  </div>
</template>

<script>
export default {
  name: 'EditorPreviewSurveyDescription',
  props: {
    value: Object,
  },
  emits: ['input'],
  data: () => ({
    name: null,
    description: null
  }),
  watch: {
    value: {
      immediate: true,
      deep: true,
      handler(val) {
        const {name, description} = val;
        this.name = name;
        this.description = description;
      }
    }
  },
  methods: {
    onNameBlur() {
      if (!this.name) {
        this.name = this.value.name;
      }

      if (this.name !== this.value.name) {
        this.onInput({name: this.name});
      }
    },
    onDescriptionBlur() {
      if (!this.description) {
        this.description = this.value.description;
      }

      if (this.description !== this.value.description) {
        this.onInput({description: this.description});
      }
    },
    onInput(data) {
      this.$emit('input', Object.assign({}, this.value, data));
    }
  }
};
</script>

<style scoped>

</style>