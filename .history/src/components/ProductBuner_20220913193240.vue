<template>
  <div class="baner">
    <img src="https://vozdushnoe-buro.ru/wp-content/uploads/2020/01/1111111-1.png" alt="">
    <div class="shadow_area"></div>
    <div class="baner_text-content">
        <span></span>
    </div>
  </div>
</template>

<script>
export default {
    name: 'product-buner'
}
</script>

<style scoped> 
.baner{
    width: 250px;
    height: 300px;
    position: relative;
}

.shadow_area{
    width: 100%;
    height: 100%;
    display: block;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: rgba(0,0,0,.1);
}

.baner img{
    width: 100%;
    height: 100%;
}
</style>