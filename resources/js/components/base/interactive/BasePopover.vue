<template>
  <tooltip v-bind="$attrs" theme="light">
    <template #trigger>
      <slot name="trigger"/>
    </template>

    <slot/>
  </tooltip>
</template>

<script>
export default {
  name: 'BasePopover',
};
</script>

<style scoped>

</style>