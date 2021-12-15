<template>
  <img v-if="src" :src="src" class="user-pic"/>
</template>

<script>
export default {
  name: 'UserPicture',
  props: {
    src: String,
  },
};
</script>

<style lang="scss" scoped>
.user-pic {
  width: 56px;
  height: 56px;
  border-radius: 24px;
  align-self: center;
}
</style>