<script>
import { ref } from 'vue';


export default {
  props: {
    title: String
  },
  setup() {
    // Используем setup для определения состояния компонента
    const message = ref('Привет, мир!');
    const description = ref('Это пример Vue-компонента.');

    return { message, description };
  },
};
</script>
  
<template>
  <Head :title="title" />
  <div>
    <h1>{{ message }}</h1>
    <p>{{ description }}</p>
  </div>
</template>

