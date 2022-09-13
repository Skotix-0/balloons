<template>
    <div class="header">
        <div class="header_logo">
            <router-link to="/">
                <img src="../assets/images/logo.png" alt="Логотип"/>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Header-component'
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