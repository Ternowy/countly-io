<template>
  <div class="chart overflow-scroll overflow-x-hidden">
    <div v-for="(answer, index) in answers" :key="index"
         v-tooltip class="flex chart-record w-full h-12 px-5 items-center content-center align-middle"
         :content="answer"
    >
      <p class="flex w-full text-base font-light text-grey truncate">{{ index + 1 }}. {{ answer }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'BaseTextualChart',
  props: {
    answers: Array
  }
};
</script>

<style lang="scss" scoped>
.chart {
  height: 358px;
}

.chart-record:nth-child(n) {
  background-color: #FFFFFF;
}

.chart-record:nth-child(2n) {
  background-color: #F8F8F8;
}
</style>