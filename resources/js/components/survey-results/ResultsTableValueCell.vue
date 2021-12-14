<template>
  <div class="cell-item" :title="value">
    <p v-if="this.value.length < 100" class="text-xs text-brown">{{ vValue }}</p>
    <base-popover v-else>
      <template #trigger>
        <p class="text-xs text-brown">{{ vValue }}</p>
      </template>
      <template #default>
        <div>{{ value }}</div>
      </template>
    </base-popover>
  </div>
</template>

<script>
export default {
  name: 'ResultsTableValueCell',
  props: {
    value: String
  },
  computed: {
    vValue() {
      if (this.value.length > 30) {
        return this.value.substring(0, 30);
      } else {
        return this.value;
      }
    }
  }
}
</script>

<style scoped>

</style>