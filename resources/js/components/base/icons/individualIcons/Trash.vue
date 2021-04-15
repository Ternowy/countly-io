<!--eslint-disable-->
<template>
    <svg :width="width?width: 18" :height="height?height:18" viewBox="0 0 18 18" fill="none"
     xmlns="http://www.w3.org/2000/svg"
>
<path
    d="M13 4.2H17V5.8H15.4V16.2C15.4 16.4122 15.3157 16.6157 15.1657 16.7657C15.0157 16.9157 14.8122 17 14.6 17H3.4C3.18783 17 2.98434 16.9157 2.83431 16.7657C2.68429 16.6157 2.6 16.4122 2.6 16.2V5.8H1V4.2H5V1.8C5 1.58783 5.08429 1.38434 5.23431 1.23431C5.38434 1.08429 5.58783 1 5.8 1H12.2C12.4122 1 12.6157 1.08429 12.7657 1.23431C12.9157 1.38434 13 1.58783 13 1.8V4.2ZM6.6 8.2V13H8.2V8.2H6.6ZM9.8 8.2V13H11.4V8.2H9.8ZM6.6 2.6V4.2H11.4V2.6H6.6Z"
    fill="white"
/>
</svg>
</template>

<script>
export default {
  name: 'Trash',
  props: {
    height: {
      type: Number,
    },
    width: {
      type: Number,
    },
    fill: {
      type: String,
      default: 'brown',
    },
  },
};
</script>
