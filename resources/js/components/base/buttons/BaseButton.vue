<template>
  <a v-if="action" v-bind="$attrs" :class="classes" :href="action" :disabled="disabled">
    <slot>
      {{ label }}
    </slot>
  </a>
  <button v-else v-bind="$attrs" :class="classes" :disabled="disabled">
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
      validator: (value) => ['passive', 'action', 'classic', 'danger', 'grey', 'light-danger'].includes(value),
    },
    action: String,
    rounded: Boolean,
    clickable: {
      type: Boolean,
      default: true
    },
    disabled: Boolean,
    fixed: Boolean
  },
  computed: {
    classes() {
      const styleSizeSet = {
        width: {large: 'w-14', medium: 'w-12', small: 'w-8'},
        height: {large: 'h-14', medium: 'h-12', small: 'h-8'}
      };
      const defaultTextStyle = ['text-white', 'text-lg', 'font-medium'];
      const styleTypeSet = {
        grey: ['bg-grey', 'hover:bg-darkGrey', 'text-gray-500'],
        action: ['bg-actionGreen', 'hover:bg-greenHighlight', 'text-white', 'text-lg', 'font-medium']
      };

      let classes = ['button', 'rounded-full', styleSizeSet.height[this.size]];

      if (this.rounded) {
        classes.push(styleSizeSet.width[this.size]);
      }

      if (this.fixed) {
        classes.push('fixed-btn');
      }

      if (this.disabled) {
        classes.push(['bg-disabledGrey', 'cursor-default', ...defaultTextStyle]);
        return classes;
      }

      classes.push(`button-${this.type}`);

      if (Object.keys(styleTypeSet).includes(this.type)) {
        classes.push(...styleTypeSet[this.type]);
      } else {
        classes.push(defaultTextStyle);
      }

      classes.push(this.clickable ? 'cursor-pointer' : 'cursor-default');

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

  &:focus {
    outline: 0;
  }
}

.button-passive {
  background-color: #E8E3D6;

  &:hover {
    background-color: #F2EFE4;
  }
}

.button-classic {
  background-color: #FFFFFF;

  &:hover {
    background-color: #FAF7EC;
  }
}

.button-danger {
  background-color: #F95D51;

  &:hover {
    background-color: #FF8278;
  }
}

.button-light-danger {
  background-color: #FFE4E4;
}

.fixed-btn {
  position: fixed;
  right: 7%;
  bottom: 60px;
  width: 264px;
}

@media (max-width: 768px) {
  .fixed-btn {
    right: 50%;
    transform: translateX(50%);
    bottom: 40px;
    width: 227px;
    border-radius: 50px;
  }
}
</style>
