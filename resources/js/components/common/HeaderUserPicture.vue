<template>
  <img v-if="src" :src="src" alt="User Image">
</template>

<script>
export default {
  name: 'HeaderUserPicture',
  props: {
    src: String,
  },
};
</script>

<style lang="scss" scoped>
img {
    height: 56px;
    width: 56px;
    border-radius: 24px;

    @media (max-width: 768px) {
        height: 30px;
        width: 30px;
        border-radius: 12px;

    }

}
</style>
