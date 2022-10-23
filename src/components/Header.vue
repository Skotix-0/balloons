<template>
  <div class="header">
    <div class="header_logo">
      <img src="../assets/images/logo.png" alt="Логотип" style="width: 80%;" />
    </div>
  </div>
</template>

<script>
export default {
  name: "Header-component",
};
</script>

<style scoped>
.header_logo {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 0px;
}
</style>