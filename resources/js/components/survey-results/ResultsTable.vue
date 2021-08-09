<template>
  <div class="flex w-full flex-col">
    <div class="flex flex-row w-full overflow-auto" style="height: 65vh;">
      <table class="w-full">
        <thead>
          <tr>
            <th>
              <div class="cell-item bg-white">
                <p class="text-sm text-center text-grey">
                  Answered on
                </p>
              </div>
            </th>
            <th v-for="(field, labelIndex) in Object.values(structure)" :key="`label-${labelIndex}`">
              <div class="cell-item">
                <p class="text-sm text-center text-grey">
                  {{ field.label }}
                </p>
              </div>
            </th>
            <th>
              <div class="cell-item bg-white">
                <p class="text-sm text-center text-grey">
                  Estimated quality
                </p>
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
        <tr v-for="(inputs, inputIndex) in data" :key="`inputIndex-${inputIndex}`">
          <td>
            <div class="cell-item">
              <p class="text-xs text-brown">{{ moment(inputs.created_at).format("DD.MM.YYYY HH:m") }}</p>
            </div>
          </td>
          <td v-for="(answer, answerIndex) in inputs.value" :key="`answerIndex-${answerIndex}`">
            <div class="cell-item">
              <p class="text-xs text-">{{ answer.value }}</p>
            </div>
          </td>
          <td class="content-td">
            <div class="cell-item">
              <base-badge :label="inputs.quality" :type="getQualityBadgeType(inputs.quality)"/>
            </div>
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
import BaseBadge from '../base/info/BaseBadge'

export default {
  name: 'ResultsTable',
  components: { BaseBadge },
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
    getQualityBadgeType(quality) {
      return {
        poor: 'danger',
        medium: 'warning',
        good: 'default',
        unknown: 'inactive'
      }[quality];
    }
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
  padding: 10px 20px 10px 20px;
}

tr, th {
  background-color: #fff;
}

tr:nth-child(even) {
  background-color: #f5f5f5;
}

td, th {
  width: 200px;
  height: 75px;
}

table {
  table-layout: fixed;
  width: 100%;
}

thead tr th {
  position: sticky;
  top: 0;
}

th:last-child {
  z-index: 2;
}

td:last-child, th:last-child {
  position:sticky;
  background-color: inherit;
  right:0;
}

@media (max-width: 768px) {
  td:last-child, th:last-child {
    position: inherit;
  }

  td:first-child, th:first-child {
    position: inherit;
  }
}
</style>