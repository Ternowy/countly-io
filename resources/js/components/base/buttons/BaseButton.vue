<template>
  <a v-if="action" v-bind="$attrs" :class="classes" :href="action">
    <slot>
      {{ label }}
    </slot>
  </a>
  <button v-else v-bind="$attrs" :class="classes">
    <slot>
      {{ label }}
    </slot>
  </button>
</template>

<script>
export default {
  name: 'BaseButton',
  props: {
    label: {
      type: String,
      default: 'This is a button',
    },
    size: {
      type: String,
      default: 'large',
      validator: (value) => ['large', 'medium'].includes(value),
    },
    type: {
      type: String,
      required: true,
      validator: (value) => ['passive', 'action', 'classic', 'danger'].includes(value),
    },
    action: String
  },
  computed: {
    classes() {
      let classes = ['button', `button-${this.size}`, `button-${this.type}`];

      return classes;
    },
  },
};
</script>

<style lang="scss">
.button {
  display: flex;
  justify-content: center;
  flex-direction: row;
  align-items: center;
  align-self: center;
  border-radius: 50%;
  border: 0;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  line-height: 20px;
  text-decoration: none;

  &:hover {
    cursor: pointer;
  }

  &:focus {
    outline: 0;
  }
}

.button-large {
  height: 56px;
  width: 56px;
}

.button-medium {
  height: 46px;
  width: 46px;
}

.button-passive {
  background-color: #E8E3D6;

  &:hover {
    background-color: #F2EFE4;
  }

  &:focus {
    background-color: #F2EFE4;
  }
}

.button-action {
  background-color: #29AD62;

  &:hover {
    background-color: #32C973;
  }

  &:focus {
    background-color: #1A9C52;
  }
}

.button-classic {
  background-color: #FFFFFF;

  &:hover {
    background-color: #FAF7EC;
  }

  &:focus {
    background-color: #E8E3D6;
  }
}

.button-danger {
  background-color: #F95D51;

  &:hover {
    background-color: #FF8278;
  }

  &:focus {
    background-color: #D93428;
  }
}
</style>