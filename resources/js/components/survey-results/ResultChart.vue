<template>
  <div class="w-full px-7">
    <component :is="componentName" v-bind="componentData"/>
  </div>
</template>

<script>
export default {
  name: 'ResultChart',
  props: {
    label: String,
    type: String,
    answersNumber: Number,
    answers: [Array, Object]
  },
  computed: {
    componentName() {
      const textual = ['text', 'textarea'];

      if (textual.includes(this.type)) {
        return 'textual-chart';
      } else {
        return 'bar-chart';
      }
    },
    componentData() {
      return {
        label: this.label,
        answersNumber: this.answersNumber,
        answers: this.answers
      }
    }
  }
};
</script>

<style scoped>

</style>