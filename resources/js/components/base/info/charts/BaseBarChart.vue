<template>
  <div>
    <WCartesian :dataset="answers" :height="300" :bound="[0]" responsive>
      <WBar datakey="value" :width="45"
            :color="['#463303', '#5A440B', '#7D6018', '#9E7409', '#C59112', '#DBA726', '#F3BD33']"
      />
      <WXAxis datakey="label" :space="[0, 50, 50, 50]"/>
      <WYAxis :space="[25, 0, 0, 50]" hide-line hide-tick-mark/>
    </WCartesian>
  </div>
</template>

<script>
import { WCartesian, WBar, WXAxis, WYAxis } from 'vue-wcharts';

export default {
  name: 'BaseBarChart',
  components: {
    WCartesian,
    WBar,
    WXAxis,
    WYAxis
  },
  props: {
    answers: {
      type: Array,
      default: () => []
    },
    labelKey: {
      type: String,
      default: 'label'
    },
    valueKey: {
      type: String,
      default: 'value'
    }
  }
};
</script>

<style scoped>

</style>
