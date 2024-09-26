<script>
import image from '@/assets/img/reload.png'
export default {
    

    data() {
        return {
            imagePath: image
        }
    }
}
</script>

<template>
    <header>
        <h1>Vueserv</h1>
        <img :src="imagePath" alt="reload" class="image">
    </header>
</template>

<style scoped>

    h1 {
        font-weight: 500;
        cursor: default;
    }

    .image {
        width: 30px;
        height: 30px;
        cursor: pointer;
    }

    .image:hover {
        animation: rotate 2s linear infinite;
    }

    .image:active {
        width: 25px;
        height: 25px;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
</style>