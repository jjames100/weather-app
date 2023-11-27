<template>
    <div class="not-found">
        <h1>Page not found</h1>
        <router-link :to="{ name: 'Home' }">Back to home pape</router-link>
    </div>
</template>

<style scoped>
.not-found {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px;
    display: flex;
    flex-direction: column;
}

.not-found > h1 {
    font-size: 48px;
}

.not-found > a {
    text-align: center;
    font-size: 24px;
}
</style>
