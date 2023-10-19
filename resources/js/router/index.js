import {createWebHistory, createRouter} from "vue-router";

import PagesList from "../components/pages/PagesList.vue";
import PagesCreateOrUpdate from "../components/pages/PagesCreateOrUpdate.vue";
import BlogCategoriesList from "../components/blog/categories/BlogCategoriesList.vue";
import BlogCategoriesCreateOrUpdate from "../components/blog/categories/BlogCategoriesCreateOrUpdate.vue";
import BlogPostsList from "../components/blog/posts/BlogPostsList.vue";
import BlogPostsCreateOrUpdate from "../components/blog/posts/BlogPostsCreateOrUpdate.vue";

export const routes = [
    //Страницы
    {
        name: 'pages-list',
        path: '/manager/pages',
        component: PagesList,
        meta: {
            title: 'Страницы',
            namePage: 'Страницы'
        },
    },
    {
        name: 'pages-create',
        path: '/manager/pages/create',
        component: PagesCreateOrUpdate,
        meta: {
            title: 'Добавить страницу',
            namePage: 'Добавить страницу'
        },
    },
    {
        name: 'pages-edit',
        path: '/manager/pages/:id',
        component: PagesCreateOrUpdate,
        meta: {
            title: 'Редактировать страницу',
            namePage: 'Редактировать страницу'
        },
    },
    {
        name: 'pages-edit-lang',
        path: '/manager/pages/:id/:lang',
        component: PagesCreateOrUpdate,
        meta: {
            title: 'Редактировать страницу',
            namePage: 'Редактировать страницу'
        },
    },
    //Страницы

    //Блог рубрики
    {
        name: 'blog-categories-list',
        path: '/manager/blog/categories',
        component: BlogCategoriesList,
        meta: {
            title: 'Рубрики блога',
            namePage: 'Рубрики блога'
        },
    },
    {
        name: 'blog-categories-create',
        path: '/manager/blog/categories/create',
        component: BlogCategoriesCreateOrUpdate,
        meta: {
            title: 'Добавить рубрику',
            namePage: 'Добавить рубрику'
        },
    },
    {
        name: 'blog-categories-edit',
        path: '/manager/blog/categories/:id',
        component: BlogCategoriesCreateOrUpdate,
        meta: {
            title: 'Редактировать рубрику',
            namePage: 'Редактировать рубрику'
        },
    },
    {
        name: 'blog-categories-edit-lang',
        path: '/manager/blog/categories/:id/:lang',
        component: BlogCategoriesCreateOrUpdate,
        meta: {
            title: 'Редактировать категорию',
            namePage: 'Редактировать категорию'
        },
    },
    //Блог рубрики

    //Блог записи
    {
        name: 'blog-posts-list',
        path: '/manager/blog/posts',
        component: BlogPostsList,
        meta: {
            title: 'Блог записи',
            namePage: 'Блог записи'
        },
    },
    {
        name: 'blog-posts-create',
        path: '/manager/blog/posts/create',
        component: BlogPostsCreateOrUpdate,
        meta: {
            title: 'Добавить запись',
            namePage: 'Добавить запись'
        },
    },
    {
        name: 'blog-posts-edit',
        path: '/manager/blog/posts/:id',
        component: BlogPostsCreateOrUpdate,
        meta: {
            title: 'Редактировать запись',
            namePage: 'Редактировать запись'
        },
    },
    {
        name: 'blog-posts-edit-lang',
        path: '/manager/blog/posts/:id/:lang',
        component: BlogPostsCreateOrUpdate,
        meta: {
            title: 'Редактировать запись',
            namePage: 'Редактировать запись'
        },
    },
    //Блог записи

    ];

    const router = createRouter({
        history: createWebHistory(),
        routes: routes,
    });

    export default router;
