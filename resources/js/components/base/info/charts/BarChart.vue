<template>
  <chart-wrapper v-bind="{label, answersNumber}">
    <base-bar-chart :answers="formattedAnswers"/>
    <div class="grid grid-cols-3 gap-2 px-8 py-3 agenda border-t">
      <div v-for="(inputLabel, index) in Object.keys(answers)" :key="index"
           v-tooltip :content="inputLabel"
           class="flex flex-row align-middle items-center h-8 agenda-item"
      >
        <span class="flex agenda-mark"/>
        <p class="text-base font-light truncate ... ml-7">{{ index + 1 }}. {{ inputLabel }}</p>
      </div>
    </div>
  </chart-wrapper>
</template>

<script>
import BaseBarChart from './Base/BaseBarChart';
import ChartDataFormatter from '../../../../service/chart-data-formatter';
import ChartWrapper from './ChartWrapper';

export default {
  name: 'BarChart',
  components: {ChartWrapper, BaseBarChart},
  props: {
    label: String,
    answersNumber: Number,
    answers: Object,
  },
  data() {
    return {
      formattedAnswers: ChartDataFormatter.formatData(this.answers, 'label', 'value'),
    };
  },
  computed: {},
};
</script>

<style lang="scss" scoped>
.agenda-item:nth-child(n) .agenda-mark {
  background-color: #463303;
}

.agenda-item:nth-child(2n) .agenda-mark {
  background-color: #5A440B;
}

.agenda-item:nth-child(3n) .agenda-mark {
  background-color: #7D6018;
}

.agenda-item:nth-child(4n) .agenda-mark {
  background-color: #9E7409;
}

.agenda-item:nth-child(5n) .agenda-mark {
  background: #C59112;
}

.agenda-item:nth-child(6n) .agenda-mark {
  background: #DBA726;
}

.agenda-item:nth-child(7n) .agenda-mark {
  background-color: #F3BD33;
}

.agenda-item:nth-child(8n) .agenda-mark {
  background-color: #FFD15D;
}

.agenda-item:nth-child(9n) .agenda-mark {
  background-color: #FFE49D;
}

.agenda-mark {
  height: 16px;
  width: 16px;
  position: absolute;
  border-radius: 50%;
}
</style>
