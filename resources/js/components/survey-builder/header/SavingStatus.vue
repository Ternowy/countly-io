<template>
  <div class="flex flex-row wrapper rounded-full items-center" :class="classes">
    <base-button type="classic" :clickable="false" rounded>
      <base-icon :name="currentIcon" fill="#696352" size="large"/>
    </base-button>
    <div class="description-wrapper flex w-28 items-center rounded-r-full h-full justify-end absolute">
      <p class="status-description text-base mr-4 text-center">{{ statusLabel }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SavingStatus',
  props: {
    status: {
      type: String,
      required: true,
      validate: (value) => ['saving', 'saved'].includes(value),
    },
  },
  computed: {
    currentIcon() {
      return this.status === 'saving' ? 'cloud-upload' : 'cloud-checkmark';
    },
    statusLabel() {
      return this.status === 'saving' ? 'Saving...' : 'Saved';
    },
    classes() {
      return this.status === 'saving' ? ['saving'] : [];
    }
  }
};
</script>

<style lang="scss" scoped>
.wrapper {
  overflow: hidden;
  position: relative;
  height: 56px;
  z-index: 1005;
}

.description-wrapper {
  left: -5px;
  transition: 1s;
}

.button {
  z-index: 1006;
}

.saving {
  overflow: inherit;
  .description-wrapper {
    left: 30px;
    background-color: #E8E3D6;
  }
}
</style>
