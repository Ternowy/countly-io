<template>
  <validation-observer ref="form" v-bind="$attrs" tag="form"
                       class="container flex flex-col content-center justify-center items-center my-16"
                       v-on="$listeners"
  >
    <div class="flex flex-col xl:w-5/12 md:w-7/12 sm:w-9/12">
      <slot/>
    </div>
  </validation-observer>
</template>

<script>
export default {
  name: 'Preview',
  methods: {
    validate() {
      return this.$refs.form.validate();
    },
  },
};
</script>

<style scoped>

</style>
