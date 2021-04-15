<template>
  <div>
      <a :href="action" class="create-survey">
          <BaseButton  rounded icon :background="variables.white" :shadow="variables.brown">
              <BaseIcon slot="pre-icon" icon="plus" :fill="variables.brown" />
          </BaseButton>
          <h4>CREATE NEW SURVEY</h4>
          <span>(You can create up to 5 survey)</span>
      </a>
  </div>
</template>

<script>
export default {
  name: 'CreateSurveyCTA',
  props: {
    action: {
      type: String,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
a.create-survey{
    border: 1px dashed #B7B3AA;
    border-radius: 20px;
    height: 415px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    cursor: pointer;
    text-decoration: none;
    transition: transform 0.2s ease-in-out;
    &:hover{
        transform: scale(1.03);
    }
    h4{

        margin: 20px 0 11px 0;
        font-weight: normal;
        font-size: 20px;
        line-height: 23px;
        color: #696352;
        text-decoration: none;
    }
    span{
        font-weight: 300;
        font-size: 16px;
        line-height: 18px;
        color: #696352;
        text-decoration: none;

    }
}
@media (max-width: 768px) {
    a.create-survey{
        height: 261px;
        h4{
            font-size: 14px;
            line-height: 16px;
            margin: 10px 5px;
        }
        span{
            font-size: 10px;
            line-height: 11px;
        }
    }
}

</style>
