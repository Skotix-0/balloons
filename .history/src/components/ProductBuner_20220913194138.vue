<template>
  <div class="baner">
    <img src="https://vozdushnoe-buro.ru/wp-content/uploads/2020/01/1111111-1.png" alt="">
    <div class="shadow_area"></div>
    <div class="baner_text-content">
        <span>TEst</span>
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
    width: 280px;
    height: 380px;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
}

.shadow_area{
    display: block;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: rgba(0,0,0,.2);
    background-color: rgba(0,0,0,0.1);
}

.baner img{
    width: 100%;
    height: 100%;
    transition: all .3s ease;
}

.baner:hover img{
    transform: scale(1.2);
}

.baner_text-content{
    position: absolute;
    margin-left: auto;
    margin-right: auto;
    left: 0;
    right: 0;
    text-align: center;
}

</style>