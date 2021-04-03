<template>
  <div>
    <base-icon v-if="icon" :name="icon"/>
    {{ label }}
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