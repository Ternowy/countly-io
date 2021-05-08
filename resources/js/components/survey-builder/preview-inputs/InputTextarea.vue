<template>
  <base-textarea v-model="vValue" :maxlength="100"
                 class="w-full flex good-shadow rounded-lg px-4 py-2 text-gray-600 font-light text-base"
  >
    <base-counter :limit="1000" :value="vValue.length"/>
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
