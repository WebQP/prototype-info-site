import {createWebHistory, createRouter} from "vue-router";

//Страницы
import PagesList from "../components/pages/PagesList.vue";
import PagesCreateOrUpdate from "../components/pages/PagesCreateOrUpdate.vue";

//Блог
import BlogCategoriesList from "../components/blog/categories/BlogCategoriesList.vue";
import BlogCategoriesCreateOrUpdate from "../components/blog/categories/BlogCategoriesCreateOrUpdate.vue";
import BlogPostsList from "../components/blog/posts/BlogPostsList.vue";
import BlogPostsCreateOrUpdate from "../components/blog/posts/BlogPostsCreateOrUpdate.vue";

//Магазин
import ShopCategoriesList from "../components/shop/categories/ShopCategoriesList.vue";
import ShopCategoriesCreateOrUpdate from "../components/shop/categories/ShopCategoriesCreateOrUpdate.vue";
import ShopProductsList from "../components/shop/products/ShopProductsList.vue";
import ShopProductsCreateOrUpdate from "../components/shop/products/ShopProductsCreateOrUpdate.vue";
import ShopBrandsList from "../components/shop/brands/ShopBrandsList.vue";
import ShopBrandsCreateOrUpdate from "../components/shop/brands/ShopBrandsCreateOrUpdate.vue";

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

    //Магазин категории
    {
        name: 'shop-categories-list',
        path: '/manager/shop/categories',
        component: ShopCategoriesList,
        meta: {
            title: 'Категории магазина',
            namePage: 'Категории магазина'
        },
    },
    {
        name: 'shop-categories-create',
        path: '/manager/shop/categories/create',
        component: ShopCategoriesCreateOrUpdate,
        meta: {
            title: 'Добавить категорию',
            namePage: 'Добавить категорию'
        },
    },
    {
        name: 'shop-categories-edit',
        path: '/manager/shop/categories/:id',
        component: ShopCategoriesCreateOrUpdate,
        meta: {
            title: 'Редактировать категорию',
            namePage: 'Редактировать категорию'
        },
    },
    {
        name: 'shop-categories-edit-lang',
        path: '/manager/shop/categories/:id/:lang',
        component: ShopCategoriesCreateOrUpdate,
        meta: {
            title: 'Редактировать категорию',
            namePage: 'Редактировать категорию'
        },
    },
    //Магазин категории

    //Магазин бренды
    {
        name: 'shop-brand-list',
        path: '/manager/shop/brands',
        component: ShopBrandsList,
        meta: {
            title: 'Список брендов',
            namePage: 'Список брендов'
        },
    },
    {
        name: 'shop-brand-create',
        path: '/manager/shop/brands/create',
        component: ShopBrandsCreateOrUpdate,
        meta: {
            title: 'Добавить бренд',
            namePage: 'Добавить бренд'
        },
    },
    {
        name: 'shop-brand-edit',
        path: '/manager/shop/brands/:id',
        component: ShopBrandsCreateOrUpdate,
        meta: {
            title: 'Редактировать бренд',
            namePage: 'Редактировать бренд'
        },
    },
    {
        name: 'shop-brand-edit-lang',
        path: '/manager/shop/brands/:id/:lang',
        component: ShopBrandsCreateOrUpdate,
        meta: {
            title: 'Редактировать бренд',
            namePage: 'Редактировать бренд'
        },
    },
    //Магазин бренды

    //Магазин товары
    {
        name: 'shop-product-list',
        path: '/manager/shop/products',
        component: ShopProductsList,
        meta: {
            title: 'Список товаров',
            namePage: 'Список товаров'
        },
    },
    {
        name: 'shop-product-create',
        path: '/manager/shop/products/create',
        component: ShopProductsCreateOrUpdate,
        meta: {
            title: 'Добавить товар',
            namePage: 'Добавить товар'
        },
    },
    {
        name: 'shop-product-edit',
        path: '/manager/shop/products/:id',
        component: ShopProductsCreateOrUpdate,
        meta: {
            title: 'Редактировать товар',
            namePage: 'Редактировать товар'
        },
    },
    {
        name: 'shop-product-edit-lang',
        path: '/manager/shop/products/:id/:lang',
        component: ShopProductsCreateOrUpdate,
        meta: {
            title: 'Редактировать товар',
            namePage: 'Редактировать товар'
        },
    },
    //Магазин товары

    ];

    const router = createRouter({
        history: createWebHistory(),
        routes: routes,
    });

    export default router;
