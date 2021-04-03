<template>
  <input-with-options v-bind="$attrs" v-on="$listeners"/>
</template>

<script>
import InputWithOptions from './components/InputWithOptions';

export default {
  name: 'InputCheckbox',
  components: {InputWithOptions},
};
</script>

<style scoped>

</style>