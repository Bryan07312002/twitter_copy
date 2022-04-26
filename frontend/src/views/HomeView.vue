<script setup>
  import { defineComponent } from 'vue'
  import DefaultLayout from '../layouts/DefaultLayout.vue';
</script>

<template>
  <DefaultLayout>

  </DefaultLayout>
</template>

<script>
  export default defineComponent({
    setup() {
        
    },
    props:{
      isOpen:Boolean
    }
  })
</script>