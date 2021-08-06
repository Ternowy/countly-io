<template>
  <div class="flex w-full flex-col">
    <div class="flex w-full flex-col overflow-x-auto">
      <div class="flex w-full flex-row">
        <div v-for="(field, labelIndex) in Object.values(structure)" :key="`label-${labelIndex}`"
             class="border-2 border-black px-10"
        >
          <p class="text-base text-grey w-60">{{ field.label }}</p>
        </div>
      </div>

      <div v-for="(inputs, inputIndex) in data" :key="`input-${inputIndex}`" class="flex w-full flex-row">
        <div v-for="(answer, answerIndex) in inputs" :key="`input-${answerIndex}`"
             class="border-2 border-black px-10"
        >
          <p class="text-base text-grey w-60">{{ answer.value }}</p>
        </div>
      </div>
    </div>
    <base-button type="action" class="mt-10" :disabled="!canLoadNextPage" @click.native="loadMore">
      <p class="px-10">Load more</p>
    </base-button>
  </div>
</template>

<script>
export default {
  name: 'ResultsTable',
  props: {
    data: Array,
    structure: Object,
    canLoadNextPage: Boolean
  },
  data () {
    return {
      currentPage: 1,
    }
  },
  created () {
    this.update(1)
  },
  methods: {
    loadMore () {
      this.update(this.currentPage + 1)
    },
    update (page) {
      this.currentPage = page
      this.$emit('update', page)
    },
  },
}
</script>

<style lang="scss" scoped>
.table-cell-item {

}
</style>