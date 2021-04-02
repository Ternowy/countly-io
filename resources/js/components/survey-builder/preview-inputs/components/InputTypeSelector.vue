<template>
  <div>
    <base-square-button v-for="(option, index) in options" :key="index"
                        @click="onSelect(option)"
    />
  </div>
</template>

<script>
export default {
  name: 'InputTypeSelector',
  props: {
    options: {
      type: Array,
      default: () => []
    }
  },
  data: () => ({
    current: null,
  }),
  methods: {
    onSelect(type) {

    }
  }
};
</script>

<style scoped>

</style>