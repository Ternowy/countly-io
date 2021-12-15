<template>
  <div class="flex flex-row items-center">
    <base-icon v-if="icon" :name="icon" fill="#828282"/>
    <p class="text-center text-base ml-2">{{ label }}</p>
  </div>
</template>

<script>
export default {
  name: 'BaseItem',
  props: {
    label: String,
    icon: String
  }
};
</script>

<style scoped>

</style>
