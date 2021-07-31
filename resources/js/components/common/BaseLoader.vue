<template>
  <div v-show="isLoading" class="flex overflow-y-auto h-screen w-screen justify-center align-middle items-center absolute z-50 bg-black bg-opacity-40">
    <img :src="image" class="loading-image" alt="loader"/>
  </div>
</template>

<script>
export default {
  name: 'BaseLoader',
  props: {
    image: String
  },
  data() {
    return {
      instances: 0
    }
  },
  computed: {
    isLoading() {
      return this.instances > 0;
    }
  },
  mounted() {
    this.$eventBus.$on(this.$eventBusEvents.LOADING, this.onLoading);
    this.$eventBus.$on(this.$eventBusEvents.LOADED, this.onLoaded);
  },
  destroyed() {
    this.$eventBus.$off(this.$eventBusEvents.LOADING, this.onLoading);
    this.$eventBus.$off(this.$eventBusEvents.LOADED, this.onLoaded);
  },
  methods: {
    onLoading() {
      this.instances++;
    },
    onLoaded() {
      this.instances--;
    }
  }
};
</script>

<style lang="scss" scoped>
@keyframes loading {
  0%   {transform: scale(1);}
  25%  {transform: scale(1.2);}
  50%  {transform: scale(1);}
  75%  {transform: scale(1.2);}
  100% {transform: scale(1);}
}

/* The element to apply the animation to */
.loading-image {
  width: 150px;
  transition: 1s;
  animation-name: loading;
  animation-iteration-count: infinite;
  animation-duration: 4s;
}

</style>