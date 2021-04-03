<template>
  <div>
    <base-input v-model="vValue"/>
    <base-icon name="input-option-remove" @click.native="$emit('remove')"/>
  </div>
</template>

<script>
import vValueMixin from '../../../../mixins/helpers/v-value-mixin';

export default {
  name: 'InputOption',
  mixins: [vValueMixin],
  emits: ['remove'],
};
</script>

<style scoped>

</style>