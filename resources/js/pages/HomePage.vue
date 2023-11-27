<script setup>
import Card from "../components/Card.vue";
import data from "../assets/data.json";

const cities = data.cities;
</script>

<template>
    <div class="home-page">
        <div class="home-page-container">
            <div class="left">
                <div class="left-container">
                    <img src="/images/home2.jpg" alt="" />
                    <div class="overlay"></div>
                    <div class="left-title">
                        <h2>Discover Japan</h2>
                        <p>Your Gateway to Rich Heritage and Modern Marvels</p>
                    </div>
                </div>
            </div>

            <div class="right">
                <div class="right-container">
                    <div class="right-title">
                        <h2>Explore Japan: Tradition in Every Step</h2>
                    </div>

                    <div class="card-grid">
                        <Card
                            v-for="city in cities"
                            :key="city.id"
                            :city="city"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.home-page-container {
    display: flex;
}

.left {
    flex: 0.55;
    position: relative;
}

.left-container {
    height: 100vh;
    width: 100%;
    top: 0;
    position: sticky;
}

.left-container img {
    width: 100%;
    height: 100vh;
    object-fit: cover;
    object-position: center center;
    overflow: hidden;
    vertical-align: bottom;
}

.left-title {
    position: absolute;
    top: 50%;
    left: 47%;
    transform: translate(-50%, -50%);
    color: white; /* Set text color */
    z-index: 2;
}

.left-title > h2 {
    font-size: 40px;
    font-weight: 1000;
}

.left-title > p {
    margin-top: 8px;
    font-size: 18px;
}

.right {
    flex: 0.45;
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

.right-container {
    margin: 28px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.right-title > h2 {
    font-size: 28px;
}

.card-grid {
    display: grid;
    grid-template-rows: auto;
    grid-template-columns: repeat(var(--mls-grid-col-lg, 3), minmax(0, 1fr));
    column-gap: var(--mls-grid-vgap-lg, 24px);
    row-gap: var(--mls-grid-hgap-lg, 32px);
    margin-top: 30px;
}
</style>
