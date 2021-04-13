<template>
  <div class="header">
    <slot>
      <p>{{ answersNumber }} / {{ answersLimit }}</p>

      <img :src="logo"/>

      <button @click="logout">logout</button>
      <header-user-picture :src="userPic"/>
    </slot>
  </div>
</template>

<script>
export default {
  name: 'BaseHeader',
  props: {
    answersLimit: String,
    answersNumber: String,
    logo: String,
    logoutLink: String,
    userPic: String
  },
  methods: {
    logout() {
      window.location.href = this.logoutLink;
    }
  }
};
</script>

<style scoped>
.header {
  height: 50px;
}
</style>