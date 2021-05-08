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
      validator: (value) => ['large', 'medium', 'small'].includes(value),
    },
    type: {
      type: String,
      required: true,
      validator: (value) => ['passive', 'action', 'classic', 'danger', 'grey'].includes(value),
    },
    action: String,
    rounded: Boolean
  },
  computed: {
    classes() {
      const styleSizeSet = {
        width: {large: 'w-14', medium: 'w-12', small: 'w-8'},
        height: {large: 'h-14', medium: 'h-12', small: 'h-8'}
      };

      let classes = ['button', `button-${this.type}`, 'rounded-full', styleSizeSet.height[this.size]];

      const styleTypeSet = {
        grey: ['bg-grey', 'hover:bg-darkGrey', 'text-gray-500']
      };

      if (Object.keys(styleTypeSet).includes(this.type)) {
        classes.push(...styleTypeSet[this.type]);
      } else {
        classes.push(['text-white', 'text-lg', 'font-medium'])
      }

      if (this.rounded) {
        classes.push(styleSizeSet.width[this.size]);
      }

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
  border: 0;
  text-decoration: none;

  &:hover {
    cursor: pointer;
  }

  &:focus {
    outline: 0;
  }
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
