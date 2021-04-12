<template>
  <div>
    <canvas :id="`chart-${_uid}`" ref="chart" width="400" height="400"></canvas>
  </div>
</template>

<script>
import { Chart } from 'chart.js';

export default {
  name: 'BaseColumnarChart',
  props: {
    answers: Object
  },
  mounted() {
    this.initChart();
  },
  methods: {
    initChart() {
      new Chart(document.getElementById(`chart-${this._uid}`), {
        type: 'bar',
        data: {
          labels: Object.keys(this.answers),
          datasets: [{
            data: Object.values(this.answers),
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          },
          legend: {
            display: false
          },
        }
      });
    }
  }
};
</script>

<style scoped>

</style>