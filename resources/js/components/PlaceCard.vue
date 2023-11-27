<script setup>
import { defineProps } from "vue";
import { truncate } from "../helper";

const { place } = defineProps({
    place: {
        type: Object,
    },
});

const checkImage = () => {
    return Array.isArray(place?.photo) === true
        ? "/images/no-image.jpg"
        : `${place?.photo?.prefix}original${place?.photo?.suffix}`;
};
</script>

<template>
    <div class="place-card">
        <img :src="checkImage()" alt="place card" />

        <div class="details">
            <p>{{ truncate(place?.name, 27) }}</p>
            <span>{{ truncate(place?.location?.address, 30) }}</span>
        </div>
    </div>
</template>

<style scoped>
.place-card {
    display: flex;
    flex-direction: column;
}

.place-card > img {
    height: 270px;
    width: 100%;
    border-radius: 16px;
    vertical-align: bottom;
    object-fit: cover;
}

.details {
    margin-top: 12px;
}

.details > p {
    font-size: 16px;
    font-weight: 600;
}

.details > span {
    font-size: 16px;
    color: #717171;
}
</style>
