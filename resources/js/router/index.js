import {createRouter, createWebHistory} from 'vue-router';
import HomeView from '../views/HomeView.vue';
import MenuView from "../views/MenuView.vue";
import ReceiveView from '../views/ReceiveView.vue';
import SummaryView from "../views/SummaryView.vue";

const router = createRouter({
        history: createWebHistory(import.meta.env.BASE_URL),
        routes: [
            {
                path: '/',
                name: 'home',
                component: () => HomeView,
            },
            {
                path: '/menu',
                name: 'menu',
                component: () => MenuView,
            },
            {
                path: '/receive',
                name: 'receive',
                component: () => ReceiveView,
            },
            {
                path: '/summary',
                name: 'summary',
                component: () => SummaryView,
            },
        ],
    });

export default router
