<template>
  <base-input v-model="vValue" :maxlength="100"
              class="w-full good-shadow rounded-lg px-4 py-2 text-gray-600 font-light text-base"
  >
    <base-counter class="justify-self-end" :limit="100" :value="vValue.length"/>
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
