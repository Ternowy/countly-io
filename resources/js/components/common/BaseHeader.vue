<template>
  <header class="header sticky top-0 shadow-md grid-cols-3">
    <div class="flex flex-row align-middle items-center">
      <slot name="info">
        <survey-limit v-tooltip :content="surveyLimitTooltip"
                      :limit="answersLimit" :number="answersNumber"
        />
      </slot>
    </div>
    <div class="flex-row sm:hidden lg:flex align-middle items-center">
      <slot name="general">
        <header-logo class="flex" :src="logo" :uri="logoUri"/>
      </slot>
    </div>

    <div class="flex flex-row align-middle items-center">
      <slot name="actions">
        <user-picture :src="userPic" class="picture"/>
        <base-button v-tooltip type="passive" content="Logout" rounded @click.native="logout">
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
    logoUri: String,
    logoutLink: String,
    userPic: String,
  },
  data: () => ({
    surveyLimitTooltip: 'Records limit for your surveys, you can clear it on the page with results for each survey'
  }),
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
  z-index: 1001;

  .actions {
    justify-content: flex-end;

    .picture {
      margin-right: 15px;
    }
  }
}
</style>
