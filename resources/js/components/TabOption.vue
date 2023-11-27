<script setup>
import { defineProps, defineEmits } from "vue";

const emit = defineEmits(["onSelectTab"]);
const { tab, selectedTab } = defineProps({
    tab: {
        type: Object,
    },
    selectedTab: {
        type: String,
    },
});

const emitSelectTab = (tab) => {
    emit("onSelectTab", tab);
};
</script>

<template>
    <div class="tab-option" @click="emitSelectTab(`tab${tab.id}`)">
        <i
            class="material-icons"
            :class="{
                'active-color': selectedTab === `tab${tab.id}`,
            }"
        >
            {{ tab.icon }}
        </i>
        <p
            :class="{
                'active-color': selectedTab === `tab${tab.id}`,
            }"
        >
            {{ tab.name }}
        </p>
        <div
            class="slider"
            :style="{
                display: selectedTab === `tab${tab.id}` ? 'block' : 'none',
            }"
        ></div>
    </div>
</template>

<style scoped>
.tab-option {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-right: 32px;
    cursor: pointer;
}

.slider {
    position: absolute;
    height: 2px;
    width: calc(100%);
    background: rgb(34, 34, 34);
    z-index: 0;
    bottom: 0;
}

.tab-option > i {
    color: #898989;
}

.tab-option > p {
    margin-top: 8px;
    font-size: 14px;
    font-weight: 600;
    color: #898989;
    padding-bottom: 10px;
}

.active-color {
    color: rgb(34, 34, 34) !important;
}
</style>
