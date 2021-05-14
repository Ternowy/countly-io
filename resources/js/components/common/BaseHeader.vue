<template>
  <header class="header p-app">
    <div class="item info">
      <slot name="info">
        <survey-limit :limit="answersLimit" :number="answersNumber"/>
      </slot>
    </div>
    <div class="item general">
      <slot name="general">
        <header-logo :src="logo"/>
      </slot>
    </div>

    <div class="item actions">
      <slot name="actions">
        <user-picture :src="userPic" class="picture"/>
        <base-button type="passive" rounded @click.native="logout">
          <base-icon name="quit" size="large"/>
        </base-button>
      </slot>
    </div>
  </header>
</template>

<script>
export default {
  name: 'BaseHeader',
  props: {
    answersLimit: String,
    answersNumber: String,
    logo: String,
    logoutLink: String,
    userPic: String,
  },
  methods: {
    logout() {
      window.location.href = this.logoutLink;
    },
  },
};
</script>

<style lang="scss" scoped>
.header {
  border-bottom: rgba(183, 179, 170, 0.5) 1px;

  .actions {
    justify-content: flex-end;

    .picture {
      margin-right: 15px;
    }
  }
}

@media (max-width: 768px) {
  .header {
    .general {
      display: none;
    }
  }
}
</style>
