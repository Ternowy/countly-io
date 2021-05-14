<template>
  <div class="flex flex-row wrapper rounded-full items-center" :class="classes">
    <base-button type="classic" :clickable="false" rounded>
      <base-icon :name="currentIcon" fill="#696352" size="large"/>
    </base-button>
    <div class="description-wrapper flex items-center rounded-r-full h-full w-full justify-center">
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
  height: 56px;
  width: 140px;
  position: relative;
}

.description-wrapper {
  position: absolute;
  left: -200px;
  transition: .75s;
}

.saving {
  .button {
    z-index: 2;
  }

  .description-wrapper {
    transition: .75s;
    left: 30px;
    background-color: #E8E3D6;
  }
}
</style>
