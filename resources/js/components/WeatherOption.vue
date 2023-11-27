<script setup>
import { defineProps } from "vue";
import { dateFormat, degreesFormat } from "../helper.js";

const { forecast } = defineProps({
    forecast: {
        type: Object,
    },
});
</script>

<template>
    <div class="weather">
        <p class="date">{{ dateFormat(forecast?.dt_txt) }}</p>

        <div class="temp">
            <div class="degrees">
                <img
                    :src="`https://openweathermap.org/img/wn/${forecast?.weather[0].icon}.png`"
                    alt="icon"
                />
                <span>
                    {{ degreesFormat(forecast?.main.temp_min) }}°C /
                    {{ degreesFormat(forecast?.main.temp_max) }}°C
                </span>
            </div>

            <span class="desc">{{ forecast?.weather[0].description }}</span>
        </div>
    </div>
</template>

<style scoped>
.weather {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
}

.date {
    font-size: 18px;
    font-weight: 00;
}

.temp {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-basis: 60%;
}

.degrees {
    display: flex;
    align-items: center;
    justify-content: center;
}

.desc {
    color: #777;
}
</style>
