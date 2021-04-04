<template>
  <base-input v-model="vValue" :maxlength="100">
    <template #right-corner>
      <base-counter :limit="200"/>
    </template>
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