<template>
  <div :class="['w-6/12 flex text-center items-center justify-center font-normal', classes]" @click="onAction">
    {{ text }}
  </div>
</template>

<script>
export default {
  name: 'ModalButton',
  props: {
    text: String,
    disabled: Boolean
  },
  emits: ['action'],
  computed: {
    classes() {
      let classes = [];

      if (this.disabled) {
        classes.push(['cursor-not-allowed']);
      }

      return classes;
    }
  },
  methods: {
    onAction() {
      this.$emit('action');
    }
  }
};
</script>

<style scoped>

</style>