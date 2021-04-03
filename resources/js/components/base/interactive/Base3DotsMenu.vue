<template>
  <div>
    <div tabindex="0" @click="open" @focusout="hide">...</div>
    <div v-show="opened">
      <slot/>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Base3DotsMenu',
  data: () => ({
    opened: false,
  }),
  methods: {
    open() {
      this.opened = true;
    },
    hide() {
      if (this.opened) {
        this.opened = false;
      }
    },
  },
};
</script>

<style scoped>

</style>