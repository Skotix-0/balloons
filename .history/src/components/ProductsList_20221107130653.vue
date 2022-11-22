<template style="margin-top: 20px;">
  <div class="product_card">
    <div class="product_card-image">
      <img :src="products.image_url" alt="" />
      <span style="font-weight: bold; margin-top: 10px;">{{ products.bp_name }}</span>
    </div>

    <div class="product-items">
      <div
        class="product-item"
        v-for="product_item in products.products"
        :key="product_item.bp_id"
      >
        <div class="product-area">
          <div class="product-item__child">
            <span>Размер</span>
            <span style="font-weight: bold">{{
              product_item.bp_param_size
            }}</span>
          </div>

          <div class="product-item__child">
            <span>Цена</span>
            <span style="font-weight: bold">{{ product_item.bp_price }} ₽</span>
          </div>
        </div>

        <button
          @click="addToCard(product_item.bp_id)"
          class="button_add_to_card"
        >
          Добавить в корзину
        </button>
      </div>
    </div>
    <scroll-to-top />
  </div>
</template>

<script>
export default {
  name: "product-list",
  props: {
    products: {
      type: Object,
      required: true,
    },
  },
  methods: {
    addToCard(bp_id) {
      if( !this.$store.getters.GETTERS_CARD.includes(bp_id) )
        this.$store.dispatch("ADD_TO_CARD", bp_id);
    },
  },
};
</script>

<style scoped lang="scss">
.product_card {
  width: 80%;
  max-width: 1200px;
  display: flex;
  justify-content: space-around;
  align-items: center;
  -moz-box-shadow: 0 0 15px #ccc;
  -webkit-box-shadow: 0 0 15px #ccc;
  box-shadow: 0 0 15px #ccc;
  border-radius: 20px;
  padding: 20px;
  margin-top: 20px;

  .product_card-image {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 250px;

    img {
      width: 100%;
      max-width: 250px;
      border-radius: 20px;
    }
  }

  .product-items {
    width: 300px;

    .button_add_to_card {
      width: 100%;
      height: 30px;
      background: #dd3333;
      border: none;
      border-radius: 5px;
      color: white;
      font-size: 15px;
      cursor: pointer;
      transition: .3s;

      &:hover{
        background: #dd3333d7;
        color: white;
      }
    }


    .product-item {
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      margin-bottom: 20px;

      .product-area {
        display: flex;
        justify-content: space-around;
        margin-bottom: 15px;
      }

      .product-item__child {
        display: flex;
        flex-direction: column;

        span:nth-child(1) {
          margin-bottom: 10px;
        }

        .minus {
          cursor: pointer;
          width: 100%;
          float: left;
          text-align: center;
        }
        .plus {
          cursor: pointer;
          width: 100%;
          float: right;
          text-align: center;
        }
        .inp_price {
          width: 100%;
          text-align: center;
          border: none;
          border-top: 1px solid gray;
          border-bottom: 1px solid gray;
        }
        .count_box {
          width: 100px;
          border: 1px solid gray;
          overflow: hidden;
          display: flex;
          flex-direction: column;
          align-items: center;
        }
      }
    }
  }
}
</style>