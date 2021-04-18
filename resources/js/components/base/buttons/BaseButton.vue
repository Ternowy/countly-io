<template>
  <div>
    <a v-if="link" v-bind="$attrs"
       :class="buttonClasses"
       :href="link"
    >
      <slot name="pre-icon"/>

      <slot name="text">
        <span>{{ label }}</span>
      </slot>

      <slot name="post-icon"/>
    </a>

    <button
      v-else
      v-bind="$attrs"
      :class="buttonClasses"
      @click="$emit('clicked')"
    >
      <slot name="pre-icon"/>

      <slot name="text">
        <span>{{ label }}</span>
      </slot>

      <slot name="post-icon"/>
    </button>
  </div>
</template>

<script>
import cssVariables from '../../../assets/variables';

export default {
  name: 'BaseButton',
  props: {
    label: String,
    color: {
      type: String,
      default: 'white',
      validator: (value) => Object.values(cssVariables).includes(value),
    },
    background: {
      type: String,
      default: 'green',
      validator: (value) => Object.values(cssVariables).includes(value),
    },
    rounded: {
      type: Boolean,
      default: false,
    },
    icon: {
      type: Boolean,
      default: false,
    },
    shadow: String,
    link: String,
  },
  emits: ['clicked'],
  computed: {
    buttonClasses() {
      const classes = [];
      if (this.rounded) {
        classes.push('rounded');
      }

      if (this.icon) {
        classes.push('icon');
      }

      classes.push(`bg-${this.background}`);

      if (this.shadow) {
        classes.push(`shadow-${this.shadow}`);
      }
      return classes;
    },
    variables() {
      return cssVariables;
    },
  },
};
</script>

<style lang="scss" scoped>
a,
button {
    cursor: pointer;
    height: 56px;
    padding: 17px 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: none;
    text-decoration: none;
    transition: all 0.2s ease-in-out;

    span {
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 21px;
        color: #FFFFFF;
    }

    &.rounded {
        border-radius: 50px;
    }

    &.icon {
        width: 56px;
        padding: 0;

        &.rounded {
            border-radius: 50%;
        }
    }
}

@media (max-width: 768px) {
    a, button {
        padding: 14px 22px;
        height: 45px;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;

        &.icon {
            height: 30px;
            width: 30px;

            svg {
                width: 11px;
            }
        }
    }
}

</style>
