<template>
  <div>
    <img v-if="src" :src="src" width="30" height="30"/>
  </div>
</template>

<script>
export default {
  name: 'HeaderUserPicture',
  props: {
    src: String
  }
};
</script>

<style scoped>

</style>