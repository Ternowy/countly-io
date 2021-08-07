<template>
  <div class="flex w-full flex-col">
    <div class="flex flex-row w-full overflow-auto" style="height: 75vh;">
      <table class="w-full">
        <thead>
        <tr>
          <td>
            <div class="cell-item bg-white">
              <p class="text-xl text-center text-grey">
                Created at
              </p>
            </div>
          </td>
          <td v-for="(field, labelIndex) in Object.values(structure)" :key="`label-${labelIndex}`">
            <div class="cell-item">
              <p class="text-xl text-center text-grey">
                {{ field.label }}
              </p>
            </div>
          </td>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(inputs, inputIndex) in data" :key="`inputIndex-${inputIndex}`">
          <td>
            <div class="cell-item bg-white">
              <p class="text-base text-brown">{{ moment(inputs.created_at).format("DD-MM-YYYY HH:m:SS") }}</p>
            </div>
          </td>
          <td v-for="(answer, answerIndex) in inputs.value" :key="`answerIndex-${answerIndex}`" class="content-td">
            <div class="cell-item"><p class="text-base text-brown">{{ answer.value }}</p></div>
          </td>
        </tr>
        </tbody>
      </table>

    </div>
    <base-button type="action" class="mt-10" :disabled="!canLoadNextPage" @click.native="loadMore">
      <p class="px-10">Load more</p>
    </base-button>
  </div>
</template>

<script>
import moment from "moment";

export default {
  name: 'ResultsTable',
  props: {
    data: Array,
    structure: Object,
    canLoadNextPage: Boolean,
  },
  data () {
    return {
      currentPage: 1,
      moment
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
.cell-item {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  align-content: center;
  border-bottom: 1px solid #f2f2f2;
  padding: 0 20px 0 20px;
}

tr {
  background-color: #fff;
}

tr:nth-child(even) {
  background-color: #DADADA;
}

td, th {
  width: 250px;
  height: 100px;
}

table {
  table-layout: fixed;
  width: 100%;
}

td:first-child, th:first-child {
  position: sticky;
  left: 0;
  z-index: 1;
}

thead tr th {
  position: sticky;
  top: 0;
}

th:first-child {
  z-index: 2;
}
</style>