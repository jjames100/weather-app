<script setup>
import { defineProps } from "vue";

const { city } = defineProps({
    city: {
        type: Object,
    },
});
</script>

<template>
    <router-link
        class="card-link"
        :to="{ name: 'CityDetails', params: { slug: city.slug } }"
    >
        <div class="card">
            <img :src="`/images/${city.image}`" :alt="city.name" />
            <div class="desc">
                <p>{{ city.name }}</p>
            </div>
        </div>
    </router-link>
</template>

<style scoped>
.card-link {
    cursor: pointer;
    position: relative;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    font-weight: inherit;
    outline: none;
    text-decoration: none;
    color: inherit;
}

.card {
    position: relative;
    overflow: hidden;
    border-radius: 32px;
}

.card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.45));
}

.card > img {
    height: 220px;
    width: 100%;
    border-radius: 32px;
    vertical-align: bottom;
    object-fit: cover;
}

.desc {
    position: absolute;
    bottom: 20px;
    left: 20px;
    color: white;
}

.desc > p {
    font-size: 18px;
}

@media (min-width: 1880px) {
    .card > img {
        height: 380px;
    }
}
</style>
