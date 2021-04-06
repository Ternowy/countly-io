<template>
  <validation-provider tag="div" :name="name" :rules="rules" :custom-messages="rulesMessages">
    <slot/>
  </validation-provider>
</template>

<script>
export default {
  name: 'InputBase',
  props: {
    name: String,
    rules: Object,
    rulesMessages: Object
  }
};
</script>

<style scoped>

</style>