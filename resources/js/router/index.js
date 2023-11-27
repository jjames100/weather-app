import { createRouter, createWebHistory } from "vue-router";
import HomePage from "../pages/HomePage.vue";
import CityPage from "../pages/CityPage.vue";
import NotFound from "../components/NotFound.vue";

const routes = [
    {
        path: "/",
        component: HomePage,
        name: "Home",
    },
    {
        path: "/city/:slug",
        component: CityPage,
        name: "CityDetails",
        props: true,
    },
    {
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
