<template>
  <tooltip ref="tooltip" v-bind="$attrs" theme="light" class="rounded" interactive>
    <template #trigger>
      <slot name="trigger"/>
    </template>
    <slot/>
  </tooltip>
</template>

<script>
export default {
  name: 'BasePopover',
  methods: {
    close() {
      this.$refs.tooltip.tippy().hide();
    },
    show() {
      this.$refs.tooltip.tippy().show();
    }
  }
};
</script>

<style scoped>

</style>
