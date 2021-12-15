export default {
  props: {
    value: [String, Array, Object]
  },
  computed: {
    vValue: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit('input', value);
      }
    }
  },
};