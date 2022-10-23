<template>
  <div class="btn-up btn-up_hide" @click="scroolToTop()"></div>
</template>

<script>
export default {
  name: "scroll-to-top",
  methods: {
    scroolToTop() {
      document.documentElement.scrollIntoView(true);
    },
  },
};
</script>

<style scoped lang="scss">
.btn-up {
  position: fixed;
  background-color: #dd3333;
  right: 20px;
  bottom: 20px;
  border-radius: 5px;
  cursor: pointer;
  width: 44px;
  height: 44px;
  transition: 0.3s;

  &:hover {
    background-color: #dd3333d7;
  }
}

.btn-up_hide {
  opacity: 0;
}

.btn-up_show {
    opacity: 1;
}

.btn-up::before {
  content: "";
  text-align: center;
  position: absolute;
  width: 20px;
  height: 20px;
  left: 12px;
  top: 12px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 20 20'%3E%3Cg fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M10 17V4M3 10l7-7 7 7'/%3E%3C/g%3E%3C/svg%3E");
}
</style>