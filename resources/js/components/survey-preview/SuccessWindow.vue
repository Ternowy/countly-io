<template>
  <div class="flex flex-col items-center" style="margin-top: 20%">
    <h1 class="text-4xl font-Ubuntu font-medium text-brown text-center">Thank you for the answer!</h1>
    <h2 class="text-2xl font-Ubuntu font-light text-brown mt-5 mb-10 text-center">Sign up and create your own survey </h2>
    <base-button class="p-5 leading-6" type="action" :action="link">
      ✌️ Create survey
    </base-button>
  </div>
</template>

<script>
export default {
  name: 'SuccessWindow',
  props: {
    link: String
  }
};
</script>

<style scoped>

</style>