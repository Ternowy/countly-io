<template>
  <WCartesian :dataset="answers" :height="300" :bound="[0]" responsive>
    <WBar :datakey="valueKey" :width="45"
          :color="['#463303', '#5A440B', '#7D6018', '#9E7409', '#C59112', '#DBA726', '#F3BD33', '#FFD15D', '#FFE49D']"
    />
    <WXAxis :datakey="labelKey" :space="[0, 50, 50, 50]"/>
    <WYAxis :space="[25, 0, 0, 50]" hide-line hide-tick-mark/>
    <WTooltip>
      <template #default="{ label, value }">
        <div class="flex flex-row items-center">
          <span class="flex tooltip-mark mr-2" :style="{'background-color': value[0].color}"/>
          <span class="flex mt-1 text-center">{{ answers[label - 1].tooltip.label }} ({{ value[0].value }})</span>
        </div>
      </template>
    </WTooltip>
  </WCartesian>
</template>

<script>
import {WBar, WCartesian, WTooltip, WXAxis, WYAxis} from 'vue-wcharts';

export default {
  name: 'BaseBarChart',
  components: {
    WCartesian,
    WBar,
    WXAxis,
    WYAxis,
    WTooltip,
  },
  props: {
    answers: {
      type: Array,
      default: () => [],
    },
    labelKey: {
      type: String,
      default: 'label',
    },
    valueKey: {
      type: String,
      default: 'value',
    },
  },
};
</script>

<style lang="scss" scoped>
.tooltip-mark {
  width: 16px;
  height: 16px;
  border-radius: 8px;
}
</style>
