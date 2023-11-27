<script setup>
import { defineProps, defineEmits, onMounted, ref } from "vue";
import WeatherOption from "./WeatherOption.vue";
import axios from "axios";

const weather = ref([]);
const loading = ref(true);
const emit = defineEmits(["closeModal"]);
const { slug } = defineProps({
    slug: {
        type: String,
    },
});

const handleCloseTab = () => {
    emit("closeModal");
};

const fetchWeather = async () => {
    try {
        let response = await axios.get("/api/weather", {
            params: { slug },
        });
        let list = response.data.data.data.list;

        for (let i = 0; i < list.length; i = i + 8) {
            weather.value.push(list[i]);
        }
        loading.value = false;
    } catch (error) {
        loading.value = false;
        weather.value = [];
    }
};

onMounted(() => {
    loading.value = true;
    fetchWeather();
});
</script>

<template>
    <div class="modal">
        <div class="container">
            <div class="close" @click="handleCloseTab">
                <i class="material-icons">close</i>
            </div>

            <header>
                <div class="top">
                    <div class="title">
                        <span>5-day forecast</span>
                    </div>
                </div>
            </header>

            <div class="content">
                <div v-if="loading" class="loading">Loading...</div>

                <div v-else-if="!weather?.length" class="not-found">
                    No results found.
                </div>

                <WeatherOption
                    v-for="forecast in weather"
                    :key="forecast?.dt"
                    :forecast="forecast"
                    v-else
                />
            </div>
        </div>
    </div>
</template>

<style scoped>
.modal {
    width: 100%;
    height: 100%;
    background: rgb(0 0 0 / 45%);
    position: fixed;
    display: flex;
    align-items: center;
    justify-content: center;
    top: 0;
    left: 0;
    overflow: auto;
    z-index: 9999;
    padding: 40px;
}

.container {
    max-width: 780px;
    width: 650px;
    height: 450px;
    background: #fff;
    box-shadow: 0 5px 16px rgba(0, 0, 0, 0.2);
    position: relative;
    z-index: 10;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

header {
    min-height: 64px;
    display: flex;
    flex: 0 0 auto;
    align-items: center;
    justify-content: space-between;
    font-size: 16px;
    font-weight: 800;
    padding: 0;
    line-height: 20px;
}

.top {
    min-height: 64px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 24px;
    border-bottom: 1px solid #ebebeb;
    line-height: 20px;
    flex: 1;
}

.title > span {
    font-size: 20px;
}

.close {
    position: absolute;
    top: 20px;
    right: 20px;
    cursor: pointer;
    padding: 4px;
    line-height: 12px;
}

.content {
    margin: 10px 15px;
    position: relative;
    height: 100%;
}

.loading,
.not-found {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 28px;
}
</style>
