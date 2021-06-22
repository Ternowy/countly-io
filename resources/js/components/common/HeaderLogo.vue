<template>
  <a v-if="uri" :href="uri">
    <img :src="src" class="logo"/>
  </a>
  <img v-else :src="src" class="logo"/>
</template>

<script>
export default {
  name: 'HeaderLogo',
  props: {
    src: {
      type: String,
      required: true,
    },
    uri: String
  },
};
</script>

<style lang="scss" scoped>
.logo {
  width: 180px;
  justify-self: center;
}
</style>