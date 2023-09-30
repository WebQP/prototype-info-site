import {createWebHistory, createRouter} from "vue-router";

import EmployersList from "../components/work/employers/EmployersList.vue";

export const routes = [
    {
        name: 'employers-list',
        path: '/work/employers',
        component: EmployersList,
        meta: {
            title: 'Работодатели',
            namePage: 'Работодатели'
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
