<template>
  <modal :name="name" v-bind="$attrs" v-on="$listeners">
    <slot/>
  </modal>
</template>

<script>
export default {
  name: 'BaseModal',
  props: {
    name: {
      type: String,
      required: true
    }
  }
};
</script>

<style scoped>

</style>