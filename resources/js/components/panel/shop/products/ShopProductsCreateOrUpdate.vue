<template>
    <alert-error v-if="showError" />
    <preloader v-if="!showPage" />

    <div v-show="showPage" class="container-fluid p-0">
        <div class="row align-items-center mb-2 mb-xl-3">
            <div class="col-9">
                <h3>{{$route.meta.namePage}}</h3>
            </div>
            <div class="col-3 text-end">
                <router-link
                    :to="{ name: 'shop-product-list'}"
                >
                    <i class="fa-duotone fa-arrow-right"></i> магазин товары
                </router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <div v-if="pageLangMainName !== ''">
                    <p>Локализация &laquo;<a :href="pageSlug" target="_blank">{{pageLangMainName}}</a>&raquo;</p>
                </div>
                <input v-model="v$.pageName.$model" type="text" class="form-control page-name" placeholder="Название" required="required">
                <div class="input-errors" v-for="(error, index) of v$.pageName.$errors" :key="index">
                    <div class="error-msg">
                        {{ error.$message }}
                    </div>
                </div>

                <div v-if="pageLangMainName === ''" class="row mt-3">
                    <div class="col-md-4">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <label for="status" class="form-label m-0">Цена</label>
                            </div>
                            <div class="col-6">
                                <input
                                    v-model="v$.pagePrice.$model"
                                    type="number"
                                    class="form-control"
                                    placeholder="Цена"
                                    required="required"
                                >
                                <div class="input-errors" v-for="(error, index) of v$.pagePrice.$errors" :key="index">
                                    <div class="error-msg">
                                        {{ error.$message }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-6">
                                <label for="status" class="form-label m-0">Старая цена</label>
                            </div>
                            <div class="col-6">
                                <input
                                    v-model="v$.pagePriceOld.$model"
                                    type="number"
                                    class="form-control"
                                    placeholder="Старая цена"
                                    required="required"
                                >
                                <div class="input-errors" v-for="(error, index) of v$.pagePriceOld.$errors" :key="index">
                                    <div class="error-msg">
                                        {{ error.$message }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <label for="status" class="form-label m-0">Артикул</label>
                            </div>
                            <div class="col-6">
                                <input
                                    v-model="pageProductCode"
                                    type="text"
                                    class="form-control"
                                    placeholder="Артикул"
                                    required="required"
                                >
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-6">
                                <label for="status" class="form-label m-0">Производитель</label>
                            </div>
                            <div class="col-6">
                                <select v-model="pageBrandId" class="form-select" id="status">
                                    <option
                                        v-for="item in listBrands"
                                        :value="item.id"
                                    >
                                        {{item.name}}
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <label for="specials" class="form-label m-0">Специальное предложение</label>
                            </div>
                            <div class="col-3">
                                <input class="form-check-input" type="checkbox" v-model="pageSpecials" id="specials">
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-9">
                                <label for="recommended" class="form-label m-0">Рекомендуемый</label>
                            </div>
                            <div class="col-3">
                                <input class="form-check-input" type="checkbox" v-model="pageRecommended" id="recommended">
                            </div>
                        </div>


                    </div>

                </div>

                <div v-if="pageLangMainName === ''" class="mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label mb-0">Изображения товара</label>
                                </div>
                                <div class="col-6">
                                    <label class="input-file">
                                        <input type="file" :id="name" ref="fileSlider" accept="image/*" v-on:change="imageListUploads()">
                                        <span>Добавить изображение</span>
                                    </label>
                                </div>
                            </div>

                            <draggable
                                :list="pageImageList"
                                :disabled="!enabled"
                                item-key="name"
                                class="list-group"
                                ghost-class="ghost"
                                :move="checkMove"
                                @start="dragging = true"
                                @end="dragging = false"
                            >
                                <template #item="{ element }">
                                    <div class="list-group-item" :class="{ 'not-draggable': !enabled }">
                                        <img :src="element.url">
                                        <button @click="imageListDelete(element.id)"><i class="fa-light fa-trash-can"></i></button>
                                    </div>
                                </template>
                            </draggable>
                        </div>
                    </div>
                </div>

                <form-editor :content="pageContent" @onDataUpdated="handleDataUpdate" class="mt-3"></form-editor>

                <div class="mt-3">
                    <label for="title" class="form-label">Title</label>
                    <textarea v-model="pageTitle" class="form-control" rows="1" id="title" placeholder="Title"></textarea>
                </div>
                <div class="mt-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea v-model="pageDescription" class="form-control" rows="1" id="description" placeholder="Description"></textarea>
                </div>

            </div>


            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div  v-if="pageLangMainName === ''" class="row align-items-center mb-3">
                            <div class="col-6">
                                <label for="status" class="form-label m-0">Статус</label>
                            </div>
                            <div class="col-6">
                                <select v-model="pageStatus" class="form-select" id="status">
                                    <option value="0">Черновик</option>
                                    <option value="1">Публикация</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button v-if="!this.id" class="btn btn-primary float-right" @click="postPageData">Опубликовать</button>
                            <button v-if="this.id" class="btn btn-primary float-right" @click="postPageData">Обновить</button>
                        </div>
                    </div>
                </div>

                <div v-if="pageLangMainName === ''" class="card">
                    <div class="card-body">
                        <label for="status" class="form-label m-0">Рубрики</label>
                        <recursion-post-categories-form
                            v-for="item in listCategories"
                            :node="item"
                            :listCategories="pageCategories"
                            @checkbox-change="updateListCategoriesPost"
                        />
                    </div>
                </div>

                <div v-if="listLanguages.langList && listLanguages.langList.length > 1" class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <label for="status" class="form-label m-0">Языковая версия</label>
                            </div>
                            <div class="col-6">
                                <select v-model="pageLangSelect" class="form-select">
                                    <option
                                        v-for="(item, index) in listLanguages.langList"
                                        :value="item.prefix"
                                        @click="selectLang"
                                    >
                                        {{item.name}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import { useVuelidate } from '@vuelidate/core'
import { helpers, required } from '@vuelidate/validators'
import RecursionPostCategoriesForm from "../../assets/recursions/RecursionPostCategoriesForm.vue";
export default {
    components: {
        RecursionPostCategoriesForm,
        draggable,
    },
    setup() {
        const v$ = useVuelidate()
        return { v$ }
    },
    validations() {
        return {
            pageName: {
                required: helpers.withMessage('* Поле обязательно для заполнения', required),
                autoDirty: true
            },
            pagePrice: {
                required: helpers.withMessage('* Поле обязательно для заполнения', required),
                autoDirty: true
            },
            pagePriceOld: {
                required: helpers.withMessage('* Поле обязательно для заполнения', required),
                autoDirty: true
            }
        }
    },
    data(){
        return {
            pageLang: '',
            pageLangSelect: '',
            pageLangMainName: '',

            pageStatus: 1,          //Статус записи
            pageId: '',             //ID страницы
            pageSlug: '',           //Ссылка на страницу
            pageName: '',           //Название страницы
            pageContent: '',        //Контент страницы
            pageTitle: '',          //Title страницы
            pageDescription: '',    //Description страницы
            pageImageList: [],      //Фото товаров

            pageProductCode: '',    //Артикул
            pagePrice: 0,           //Цена товара
            pagePriceOld: 0,        //Старая цена товара
            pageBrandId: 1,         //ID производителя
            pageSpecials: 0,        //Специальное предложение
            pageRecommended: 0,      //Рекомендуемый товар
            pageCategories: [],     //Категории товара


            listLanguages: [],      //Список категорий
            listBrands: [],         //Список производителей
            listCategories: [],     //Список языков

            showPage: false,
            showError: false,

            dragging: false,
            enabled: true,
        }
    },
    computed: {
        id() {
            return this.$route.params.id
        },
        lang() {
            return this.$route.params.lang
        },
        draggingInfo() {
            return this.dragging ? "under drag" : "";
        }

    },
    created() {
        this.getListCategories();   //Запрашиваем список категорий
        this.getListBrands();       //Запрашиваем список производителей
        if(this.id){
            if(this.lang){
                this.pageLang = this.lang;
                this.pageLangSelect = this.lang;
            }else{
                this.pageLang = '';
                this.pageLangSelect = '';
            }
            this.getPageData();
        } else {
            this.showPage = true;
        }
    },
    mounted () {
        document.title = this.$route.meta.title;
    },
    methods: {
        async postPageData(){
            const isFormCorrect = await this.v$.$validate()
            if (!isFormCorrect) return

            this.showPage = true;

            let apiUrl = '/api/shop-product';
            let method = 'POST'

            if(this.id) {
                apiUrl = '/api/shop-product/'+ this.id;
                method = 'PUT'
            }

            axios.post(apiUrl, {
                pageLang: this.pageLangSelect,
                pageStatus: this.pageStatus,                //Статус страницы
                pageName: this.pageName,                    //Название страницы
                pageContent: this.pageContent,              //Контент страницы
                pageTitle: this.pageDescription,            //Title страницы
                pageDescription: this.pageDescription,      //Description страницы
                pageCategories: this.pageCategories,        //Категории товара
                pagePrice: this.pagePrice,                  //Цена товара
                pagePriceOld: this.pagePriceOld,            //Старая цена товара
                pageBrandId: this.pageBrandId,              //ID производителя
                pageSpecials: this.pageSpecials,        //Специальное предложение
                pageRecommended: this.pageRecommended,     //Рекомендуемый товар
                pageProductCode: this.pageProductCode,      //Артикул
                pageImageList: this.pageImageList,          //Фото товаров
                '_method': method,
            }).then(response => {
                if(response.status === 200){
                    if(this.pageLang === '' || this.pageLangSelect === this.listLanguages.langMain.prefix){
                        window.location.href = "/manager/shop/products/" + response.data.id;
                    }else{
                        window.location.href = "/manager/shop/products/" + this.id + '/' + this.pageLangSelect;
                    }
                    this.showPage = false;
                }
            }).catch(error => {
                this.showPage = true;
                this.showError = true;
                console.log(error);
            });
        },

        getPageData() {
            let apiUrl = '/api/shop-product/'+ this.id +'/edit';
            if(this.pageLang !== ''){
                apiUrl = '/api/shop-product/'+ this.id +'/edit?lang=' + this.pageLang;
            }
            axios
                .get(apiUrl)
                .then(response => {
                    if(response.status === 200){
                        this.pageId=response.data.pageId;
                        this.pageStatus=response.data.pageStatus;
                        this.pageSlug = response.data.pageSlug;
                        this.pageName=response.data.pageName;
                        this.pageLangMainName=response.data.pageLangMainName;
                        this.pageContent=response.data.pageContent;
                        this.pageTitle=response.data.pageTitle;
                        this.pageDescription=response.data.pageDescription;
                        this.pageImageList=response.data.pageImageList;
                        this.pageProductCode=response.data.pageProductCode;
                        this.pagePrice=response.data.pagePrice;
                        this.pagePriceOld=response.data.pagePriceOld;
                        this.pageBrandId=response.data.pageBrandId;
                        this.pageSpecials=response.data.pageSpecials;
                        this.pageRecommended=response.data.pageRecommended;
                        this.pageCategories=response.data.pageCategories;
                        this.listLanguages=response.data.listLanguages;
                        this.pageLang = this.pageLang === '' ? response.data.listLanguages.langMain.prefix : this.pageLang;
                        this.pageLangSelect = this.pageLangSelect === '' ? response.data.listLanguages.langMain.prefix : this.pageLang;
                        setTimeout(()=>{this.showPage = true;},1000);
                    }
                })
                .catch(error => {
                    this.showPage = false;
                    this.showError = true;
                    console.log(error);
                });
        },

        getListCategories() {
            let apiUrl = '/api/shop-category/list';
            axios
                .get(apiUrl)
                .then(response => {
                    if(response.status === 200){
                        this.listCategories = response.data;
                    }
                })
                .catch(error => {
                    this.showPage = false;
                    this.showError = true;
                    console.log(error);
                });
        },

        getListBrands() {
            let apiUrl = '/api/shop-brand/list';
            axios
                .get(apiUrl)
                .then(response => {
                    if(response.status === 200){
                        this.listBrands = response.data;
                    }
                })
                .catch(error => {
                    this.showPage = false;
                    this.showError = true;
                    console.log(error);
                });
        },

        //Обновление выбранных категорий
        updateListCategoriesPost(id) {
            if (!this.pageCategories.includes(id)) {
                this.pageCategories.push(id);
            } else {
                const index = this.pageCategories.indexOf(id);
                if (index !== -1) {
                    this.pageCategories.splice(index, 1);
                }
            }
        },

        handleDataUpdate(data) {
            this.pageContent = data.value;
        },

        selectLang(){
            if(this.pageLangSelect === this.pageLang){}
            else if(this.pageLangSelect === this.listLanguages.langMain.prefix){
                window.location.href = "/manager/shop/products/" + this.pageId;
            }else{
                window.location.href = "/manager/shop/products/" + this.pageId + '/' + this.pageLangSelect;
            }
        },

        imageListUploads() {
            const formData = new FormData();
            formData.append('file', this.$refs.fileSlider.files[0]);
            formData.append('folder', 'slider');
            axios
                .post('/api/upload-slider-image', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    if (response.status === 200) {
                        this.pageImageList.push({'id':0,'url':response.data})
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        },

        imageListDelete(id) {
            const index = this.pageImageList.findIndex(item => item.id === id);
            if (index !== -1) {
                this.pageImageList.splice(index, 1);
            }
        },
    }
}
</script>

<style scoped>
.buttons {
    margin-top: 35px;
}

.ghost {
    opacity: 0.5;
    background: #c8ebfb;
}

.not-draggable {
    cursor: no-drop;
}
</style>
