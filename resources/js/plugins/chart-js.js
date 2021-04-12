import {Chart, registerables} from 'chart.js';

export default {
  install(Vue) {
    Chart.register(...registerables)
  },
};