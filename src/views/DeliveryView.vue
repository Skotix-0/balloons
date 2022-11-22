<template>
    <div class="dlv_block">
        <div class="dlv_block__child">
            <div class="post-content">
                <h1>Интернет магазин «Ballone Time»</h1>
                <h3>Самовывоз: с 9:00 — 21:00 по адресу Пехотинцев 3/3</h3>
                <h3>При самовывозе действует скидка 5%</h3>
                <h3>Доставка: с 08:00 до 22:00</h3>
                <p>
                    <strong>Телефон:</strong>&nbsp;+7 (343) 207-99-96 , 8 (992)
                    016-43-16
                </p>
                <p><strong>Прием заказов:</strong> с 9:00 до 21:00</p>
                <p><strong>E-mail:</strong> shariki@mail.ru</p>
            </div>
            <div class="dlv_map">
                <h1>Карта стоимости доставки</h1>
                <iframe
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3Aee05dae33ffc256c80741aefa4efbf35dd11eede7a0f845abd116caead5bb38a&amp;source=constructor"
                    width="100%"
                    height="450"
                    frameborder="0"
                ></iframe>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.dlv_block {
    width: 100%;
    max-width: 1200px;
    margin-top: 20px;

    .dlv_block__child {
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;

        .dlv_map{
          width: 100%;
          max-width: 600px; 
        }

        .post-content {
            width: 100%;
            max-width: 600px;
            align-items: flex-start;
            justify-content: flex-start;
            display: flex;
            flex-direction: column;
        }
    }
}
</style>