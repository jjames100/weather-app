<script setup>
import { defineProps, onMounted, computed, ref } from "vue";
import { useRouter } from "vue-router";
import data from "../assets/data.json";
import { CATEGORIES, CITIES } from "../constants.js";
import TabOption from "../components/TabOption.vue";
import Cover from "../components/Cover.vue";
import PlaceCard from "../components/PlaceCard.vue";
import WeatherButton from "../components/WeatherButton.vue";
import Modal from "../components/Modal.vue";
import axios from "axios";

const selectedTab = ref("tab1");
const loading = ref(true);
const showModal = ref(false);
const places = ref([]);
const router = useRouter();
const tabs = data.tabs;
const { slug } = defineProps({
    slug: {
        type: String,
    },
});

const debounce = (callback, delay = 800) => {
    let timeout;

    return (...args) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            callback(...args);
        }, delay);
    };
};

const cityExist = () => {
    if (!CITIES.includes(slug)) {
        router.push({ name: "NotFound" });
    }
};

const selectTab = (tab) => {
    loading.value = true;
    places.value = [];
    selectedTab.value = tab;
    getPlaces(tab);
};

const getPlaces = debounce((tab) => {
    fetchPlaces(tab);
});

const fetchPlaces = async (tab) => {
    try {
        let response = await axios.get("/api/places", {
            params: { categoryId: CATEGORIES[tab], slug: slug },
        });

        places.value = response.data.data;
        loading.value = false;
    } catch (error) {
        places.value = [];
        loading.value = false;
    }
};

const selectedCity = computed(() => {
    return data.cities.find((city) => city.slug === slug);
});

onMounted(() => {
    cityExist();
    fetchPlaces(selectedTab.value);
});
</script>

<template>
    <div>
        <div class="city-page">
            <div class="city-page-container">
                <Cover :selectedCity="selectedCity" />

                <div class="city-page-places">
                    <div class="city-page-options">
                        <div class="tab-options">
                            <TabOption
                                v-for="tab in tabs"
                                :key="tab.id"
                                :tab="tab"
                                :selectedTab="selectedTab"
                                @onSelectTab="selectTab"
                            />
                        </div>

                        <WeatherButton @click="showModal = true" />
                    </div>

                    <div class="place-cards">
                        <div v-if="loading" class="loading">Loading...</div>

                        <div v-else-if="!places?.length" class="not-found">
                            No results found.
                        </div>

                        <div class="place-cards-grid" v-else>
                            <PlaceCard
                                v-for="place in places"
                                :key="place.fsq_id"
                                :place="place"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Modal v-if="showModal" @closeModal="showModal = false" :slug="slug" />
    </div>
</template>

<style scoped>
.city-page-places {
    margin-top: 24px;
    margin-left: auto;
    margin-right: auto;
    max-width: calc(min(1760px, 100%) - 120px);
}

.city-page-options {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.tab-options {
    display: flex;
}

.place-cards {
    margin: 24px 0;
}

.place-cards-grid {
    display: grid;
    grid-template-rows: auto;
    grid-template-columns: repeat(var(--mls-grid-col-lg, 4), minmax(0, 1fr));
    column-gap: var(--mls-grid-vgap-lg, 24px);
    row-gap: var(--mls-grid-hgap-lg, 32px);
}

.loading,
.not-found {
    font-size: 28px;
    text-align: center;
}
</style>
