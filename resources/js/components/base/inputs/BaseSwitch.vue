<template>
  <div v-bind="$attrs" class="interactive-btn flex flex-row" @click="onClick">
    <p v-if="label">{{ label }}</p>
    <div :class="buttonClasses" class="toggle-wrapper">
      <div :class="toggleClass" class="toggle-inner"/>
    </div>
    <slot/>
  </div>
</template>

<script>
export default {
  name: 'BaseSwitch',
  props: {
    value: Boolean,
    background: {
      type: String,
      default: 'green',
    },
    color: {
      type: String,
      default: 'white',
    },
    label: String
  },
  emits: ['input'],
  computed: {
    buttonClasses() {
      const classes = [];
      classes.push(this.value ? 'bg-' + this.background : 'bg-disabled');
      return classes;
    },
    toggleClass() {
      return this.value ? 'active' : 'inactive';
    },
  },
  methods: {
    onClick() {
      this.$emit('input', !this.value);
    },
  },
};
</script>

<style lang="scss" scoped>
.interactive-btn {
  border: none;
  background: none;
  cursor: pointer;
  font-weight: 300;
  font-size: 14px;
  line-height: 16px;
  color: #828282;
  display: flex;
  column-gap: 5px;
  align-items: center;

  .toggle-wrapper {
    position: relative;
    border-radius: 30px;
    width: 44px;
    height: 24px;

    .toggle-inner {
      position: absolute;
      top: 2px;
      left: 2px;
      width: 20px;
      height: 20px;
      background: #FFFFFF;
      box-shadow: 0 2px 5px rgba(85, 85, 85, 0.15);
      border-radius: 30px;

      &.inactive {
        right: unset;
        left: 2px;
      }

      &.active {
        left: unset;
        right: 2px;
      }
    }
  }

  .bg-green {
    background-color: #29AD62;

    &:hover {
      background-color: #29AD62;
    }

    &:active,
    &:focus {
      background-color: #29AD62;
    }
  }

  .bg-disabled {
    background-color: #E0E0E0;
  }
}

@media (max-width: 768px) {
  .interactive-btn {
    font-size: 10px;
    line-height: 11px;

    .toggle-wrapper {
      width: 26px;
      height: 14px;

      .toggle-inner {
        width: 10px;
        height: 10px;
      }
    }
  }
}
</style>
