<template>
  <div v-if="show" class="snackbar">
    {{ message }}
    <button @click="dismiss">Dismiss</button>
  </div>
</template>

<script>
import { ref } from 'vue';

export default {
  setup() {
    const show = ref(false);
    const message = ref('');

    const showSnackbar = (msg) => {
      message.value = msg;
      show.value = true;
    };

    const dismiss = () => {
      show.value = false;
    };

    return {
      show,
      message,
      showSnackbar,
      dismiss
    };
  }
};
</script>

<style scoped>
.snackbar {
  position: fixed;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  background-color: #333;
  color: #fff;
  padding: 10px;
  border-radius: 4px;
}
</style>

