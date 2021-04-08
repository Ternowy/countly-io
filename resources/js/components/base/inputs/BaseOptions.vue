<template>
  <input-base v-bind="$attrs" :name="name">
    <template v-if="multiple">

    </template>
    <template v-else>
      <div v-for="(option, index) in options" :key="index">
        <label :for="`radio-${index}-${_uid}`">
          <input :id="`radio-${index}-${_uid}`" :checked="option === value" :name="name"
                 type="radio" @input="onChangeRadio(option)"
          >
          <div class="indicator"/>
          <div class="label">
            {{ option }}
          </div>
        </label>
      </div>
    </template>
  </input-base>
</template>

<script>
export default {
  name: 'BaseOptions',
  props: {
    name: String,
    options: Array,
    multiple: {
      type: Boolean,
      default: false,
    },
    value: [String, Array],
  },
  emits: ['input'],
  methods: {
    onChangeRadio(option) {
      this.$emit('input', option);
    },

  },
};
</script>

<style scoped>

</style>