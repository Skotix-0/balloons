<template>
  <router-link class="baner" :to="`/${navOpen}?categoryId=${category.id}`">
  <!-- <div class="baner"> -->
    <img :src="category.imgUrl" alt="" />
    <div class="shadow_area"></div>
    <div class="baner_text-content">
      <strong>{{ category.title }}</strong>
    </div>
  <!-- </div> -->
  </router-link>
</template>

<script>
export default {
  name: "product-buner",
  props: {
    category: {
      type: Object,
      required: true,
    },
    navOpen: {
      type: String,
      required: true
    }
  },
};
</script>

<style scoped>
.baner {
  width: 280px;
  height: 380px;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 10px;
  break-after: auto;
  text-decoration: none;
  outline: none;
  color: #000;
}

.shadow_area {
  display: block;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.2);
  background-color: rgba(0, 0, 0, 0.1);
}

.baner img {
  width: 100%;
  height: 100%;
  transition: all 0.3s ease;
}

.baner:hover img {
  transform: scale(1.2);
}

.baner_text-content {
  position: absolute;
  margin-left: auto;
  margin-right: auto;
  left: 0;
  right: 0;
  text-align: center;
  background: white;
  width: 50%;
  height: 20%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px 30px;
}
</style>