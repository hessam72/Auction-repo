<template>
    <div class="iframe-container">
      <h1>Embedded Page</h1>
      <!-- src="http://194.33.127.20:3011/" -->

      <iframe
        src="https://omidcity.com/"
        width="100%"
        height="800"
        style="border: none;"
      ></iframe>
    </div>
  </template>
  
  <script>
  export default {
    name: 'IframePage',
    data() {
      return {
        // You can add reactive data properties here if needed
      };
    },
    mounted() {
      // Optional logic after component mounts
      console.log('IframePage mounted');
    },
  };
  </script>
  
  <style scoped>
  .iframe-container {
    padding: 20px;
    position: relative;
    z-index: 9999999;
    margin-bottom: 100rem;
  }
  </style>
  