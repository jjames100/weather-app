<template>
    <div class="weather-button">
        <button class="button">
            <span class="text-container">
                <i class="material-icons icon">cloud</i>
                <p class="text">Check weather</p>
            </span>
        </button>
    </div>
</template>

<style scoped>
.weather-button {
    display: flex;
    align-items: center;
    white-space: nowrap;
}

.button {
    cursor: pointer;
    outline: none;
    border: 1px solid rgb(221, 221, 221);
    background-color: rgb(255, 255, 255);
    border-radius: 30px;
    padding: 10px 0;
    line-height: 16px;
}

.text-container {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 16px;
}

.icon {
    font-size: 20px;
    margin-right: 8px;
    color: #222;
}

.text {
    font-size: 16px;
}
</style>
