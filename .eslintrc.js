module.exports = {
  extends: [
    // add more generic rulesets here, such as:
    // 'eslint:recommended',
    'plugin:vue/vue3-recommended',
    // 'plugin:vue/recommended' // Use this if you are using Vue.js 2.x.
  ],
  rules: {
    // override/add rules settings here, such as:
    'vue/no-unused-vars': 'error',
    'vue/component-tags-order': [
      'error', {
        'order': ['template', 'script', 'style'],
      }],
    'vue/html-closing-bracket-spacing': [
      'error', {
        'startTag': 'never',
        'endTag': 'never',
        'selfClosingTag': 'never',
      }],
    'vue/max-attributes-per-line': 'off',
    'vue/require-default-prop': 'off',
    'vue/singleline-html-element-content-newline': 'off',
    //TODO keep in mind during migration
    'vue/no-deprecated-dollar-listeners-api': 'off',
    'vue/no-deprecated-v-on-native-modifier': 'off'
  },
};