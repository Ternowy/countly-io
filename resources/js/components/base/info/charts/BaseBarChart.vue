<template>
  <div>
    <WCartesian :dataset="data" :height="300" :bound="[0]" responsive>
      <WBar datakey="value" :width="45"
            :color="['#463303', '#5A440B', '#7D6018', '#9E7409', '#C59112', '#DBA726', '#F3BD33']"
      />
      <WXAxis datakey="label" :space="[0, 50, 50, 50]"/>
      <WYAxis :space="[25, 0, 0, 50]"/>
    </WCartesian>
  </div>
</template>

<script>
import { WCartesian, WBar, WXAxis, WYAxis } from 'vue-wcharts';
import ChartDataFormatter from '../../../../service/chart-data-formatter.js';

export default {
  name: 'BaseBarChart',
  components: {
    WCartesian,
    WBar,
    WXAxis,
    WYAxis
  },
  props: {
    answers: Object,
  },
  data() {
    const labelKey = 'label';
    const valueKey = 'value';
    return {
      labelKey,
      valueKey,
      data: ChartDataFormatter.formatData(this.answers, labelKey, valueKey),
    };
  },
  mounted() {

  },
  methods: {},
};
</script>

<style scoped>

</style>
