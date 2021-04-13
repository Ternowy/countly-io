<template>
  <base-input v-model="vValue" :maxlength="100">
    <base-counter :limit="100"/>
  </base-input>
</template>

<script>
import vValueMixin from '../../../mixins/helpers/v-value-mixin';

export default {
  name: 'InputText',
  mixins: [vValueMixin],
};
</script>

<style scoped>

</style>