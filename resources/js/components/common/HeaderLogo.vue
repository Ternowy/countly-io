<template>
  <img :src="src" class="logo"/>
</template>

<script>
export default {
  name: 'HeaderLogo',
  props: {
    src: {
      type: String,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
.logo {
  width: 180px;
  justify-self: center;
}
</style>