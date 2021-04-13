<template>
  <base-textarea v-model="vValue" :maxlength="100">
    <base-counter :limit="1000"/>
  </base-textarea>
</template>

<script>
import vValueMixin from '../../../mixins/helpers/v-value-mixin';

export default {
  name: 'InputTextarea',
  mixins: [vValueMixin]
};
</script>

<style scoped>

</style>