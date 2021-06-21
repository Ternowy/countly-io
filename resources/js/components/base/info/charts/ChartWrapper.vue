<template>
  <div class="flex flex-col bg-white rounded-3xl">
    <div class="flex w-full flex-row justify-between h-12 px-8 py-10 items-center border-b">
      <p class="text-base">{{ label }}</p>
      <div v-tooltip class="flex flex-row items-center" content="Total answers">
        <p class="text-base">{{ answersNumber }}</p>
        <base-icon name="person" size="small"/>
      </div>
    </div>
    <slot/>
  </div>
</template>

<script>
export default {
  name: 'ChartWrapper',
  props: {
    label: String,
    answersNumber: Number,
  },
};
</script>

<style scoped>

</style>