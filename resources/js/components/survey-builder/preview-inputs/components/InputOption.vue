<template>
  <div class="flex flex-row h-10 border-b border-gray-300 text-base items-center justify-between">
    <base-input v-model="vValue" :maxlength="40" class="w-10/12" @blur="onBlur"/>
    <base-icon name="trash" fill="#BDBDBD" size="small" class="mr-4" clickable @click.native="$emit('remove')"/>
  </div>
</template>

<script>
export default {
  name: 'InputOption',
  props: {
    value: String,
  },
  emits: ['remove', 'input'],
  data: () => ({
    vValue: null,
  }),
  watch: {
    value: {
      immediate: true,
      handler(val) {
        this.vValue = val;
      },
    },
  },
  methods: {
    onBlur() {
      if (!this.vValue) {
        this.vValue = this.value;
      }

      if (this.vValue !== this.value) {
        this.$emit('input', this.vValue);
      }
    },
  },
};
</script>

<style scoped>

</style>
