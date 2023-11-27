<script setup>
import { defineProps } from "vue";

const { selectedCity } = defineProps({
    selectedCity: {
        type: Object,
    },
});
</script>

<template>
    <div class="cover">
        <img :src="`/images/${selectedCity?.slug}-cover.jpg`" alt="cover" />

        <div class="overlay"></div>

        <router-link class="back-page" :to="{ name: 'Home' }">
            <i class="material-icons arrow">arrow_back</i>
            <p>Back</p>
        </router-link>

        <div class="city-name">
            <p>{{ selectedCity?.name }}</p>
        </div>
    </div>
</template>

<style scoped>
.cover {
    position: relative;
    display: flex;
}

.cover > img {
    height: 80vh;
    width: 100vw;
    object-fit: cover;
    vertical-align: bottom;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.35);
    z-index: 1;
}

.back-page {
    position: absolute;
    top: 40px;
    left: 40px;
    display: flex;
    align-items: center;
    cursor: pointer;
    z-index: 3;
    outline: none;
    text-decoration: none;
}

.back-page .arrow {
    font-size: 28px;
    color: #fff;
    font-weight: 800;
}

.back-page > p {
    font-size: 20px;
    color: #fff;
    font-weight: 600;
    margin-left: 10px;
}

.city-name {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
}

.city-name > p {
    color: #fff;
    font-size: 80px;
}
</style>
