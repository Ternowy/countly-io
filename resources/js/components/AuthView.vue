<template>
  <div>
    <a :href="googleLink">
      Continue with Google
    </a>
    <a :href="facebookLink">
      Continue with Facebook
    </a>
  </div>
</template>

<script>
export default {
  name: 'AuthView',
  props: {
    googleLink: {
      type: String,
      required: true
    },
    facebookLink: {
      type: String,
      required: true
    }
  }
};
</script>
