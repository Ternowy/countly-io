<template>
  <div class="progress-bar-wrapper">
    <p>{{ number }}/{{ limit }} records</p>
    <div class="progress-bar">
      <div :style="{width: progressBarCompletion}" class="progress-inner"/>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SurveyLimit',
  props: {
    limit: String,
    number: String,
  },
  computed: {
    progressBarCompletion() {
      const completion = this.number / 50;

      if (completion < 1) {
        return '1%';
      }

      return `${completion}%`;
    }
  }
};
</script>

<style lang="scss" scoped>
.progress-bar-wrapper {
  max-width: 500px;
  display: flex;
  flex: 1;
  flex-direction: column;
  justify-content: center;

  p {
    margin-bottom: 7px;
    font-size: 16px;
    font-weight: 300;
    line-height: 18px;
    color: #4F4F4F;
  }

  .progress-bar {
    width: 100%;
    height: 15px;
    background: linear-gradient(180deg, #F0EDE3 0%, #E8E3D6 100%);
    border-radius: 30px;

    .progress-inner {
      height: 100%;
      background: linear-gradient(180deg, #32C973 0%, #29AD62 100%);
      box-shadow: 0 10px 30px rgba(50, 201, 115, 0.2);
      border-radius: 30px 0 0 30px;
      left: 0;
      top: 0;
    }
  }
}
</style>