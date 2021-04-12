<template>
  <div>
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="chart" height="100" width="100" aria-labelledby="title" role="img">
      <title id="title">A bart chart showing information</title>
      <g class="bar" transform="translate(0,0)">
        <rect height="10" y="10" width="3"></rect>
      </g>
      <g class="bar" transform="translate(3,0)">
        <rect height="6" y="14" width="3"></rect>
      </g>
      <g class="bar" transform="translate(6,0)">
        <rect height="20" width="3"></rect>
      </g>
      <g class="bar" transform="translate(9,0)">
        <rect height="10" y="10" width="3"></rect>
      </g>
      <g class="bar" transform="translate(12,0)">
        <rect height="9" y="11" width="3"></rect>
      </g>
      <g class="bar" transform="translate(15,0)">
        <rect height="10" y="10" width="3"></rect>
      </g>
      <g class="bar" transform="translate(18,0)">
        <rect height="17" y="3" width="3"></rect>
      </g>
      <g class="bar" transform="translate(21,0)">
        <rect height="18" y="2" width="3"></rect>
      </g>
    </svg>
  </div>
</template>

<script>
export default {
  name: 'vChart',
  props: {
    answers: Object
  },
};
</script>

<style scoped>
.chart {
  display: inline-block;
  margin-right: 0;
  transition: all .3s ease;
}

.bar {
  position: relative;
  fill: #aaa;
  /* height: 21px; */
  transition: fill .3s ease;
  cursor: pointer;
  font-family: Helvetica, sans-serif;
  display: inline-block;
}

</style>