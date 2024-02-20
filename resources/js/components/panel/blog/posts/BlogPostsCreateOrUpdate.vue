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
                    :to="{ name: 'pages-list'}"
                >
                    <i class="fa-duotone fa-arrow-right"></i>
                </router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <div v-if="pageLangMainName !== ''">
                    <p>Локализация &laquo;<a :href="pageSlug" target="_blank">{{pageLangMainName}}</a>&raquo;</p>
                </div>
                <input v-model="v$.pageName.$model" type="text" class="form-control page-name" placeholder="Название страницы" required="required">
                <div class="input-errors" v-for="(error, index) of v$.pageName.$errors" :key="index">
                    <div class="error-msg">
                        {{ error.$message }}
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
                        <div class="row align-items-center">
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
                        <div class="mt-3">
                            <button v-if="!this.id" class="btn btn-primary float-right" @click="postPageData">Опубликовать</button>
                            <button v-if="this.id" class="btn btn-primary float-right" @click="postPageData">Обновить</button>
                        </div>
                    </div>
                </div>

                <div v-if="listLanguages.langMain && listLanguages.langMain.prefix === pageLang" class="card">
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

                <div class="card">
                    <div class="card-body">
                        <label class="form-label mb-0">Изображение страницы</label>
                        <label class="input-file">
                            <input type="file" :id="name" ref="file" accept="image/*" v-on:change="imagePreviewUploads()">
                            <span>Установить</span>
                        </label>
                        <div v-if="pageImagePreview" class="block-preview-image">
                            <img
                                v-bind:src="pageImagePreview"
                                class="preview-image mt-3"
                                alt=""
                            />
                            <span class="mt-2" @click="imagePreviewDelete">Удалить изображение страницы</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RecursionPostCategoriesForm from "../../assets/recursions/RecursionPostCategoriesForm.vue";
import { useVuelidate } from '@vuelidate/core'
import { helpers, required } from '@vuelidate/validators'
export default {
    setup() {
        const v$ = useVuelidate()
        return { v$ }
    },
    validations() {
        return {
            pageName: {
                required: helpers.withMessage('* Поле обязательно для заполнения', required),
                autoDirty: true
            }
        }
    },
    components: {RecursionPostCategoriesForm},
    data(){
        return {
            pageLang: '',               //Язык
            pageLangSelect: '',         //Выбранный язык
            pageLangMainName: '',       //Название главной языковой версии страницы
            pageStatus: 1,              //Статус страницы по умолчанию
            pageId: '',                 //ID страницы
            pageSlug: '',               //Ссылка на страницу
            pageName: '',               //Название страницы
            pageContent: '',            //Контент страницы
            pageTitle: '',              //Title страницы
            pageDescription: '',        //Description страницы
            pageImagePreview: '',       //Превью изображение записи
            pageCategories: [],         //Список выбранных категорий

            listCategories: [],         //Список категорий
            listLanguages: [],          //Список языков

            showPage: false,            //Показ страницы/прелоадера
            showError: false,           //Показ ошибки данных
        }
    },
    computed: {
        id() {
            return this.$route.params.id
        },
        lang() {
            return this.$route.params.lang
        }
    },

    created() {
        this.getListCategories();
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
        //Отправка данных
        async postPageData(){
            const isFormCorrect = await this.v$.$validate()
            if (!isFormCorrect) return

            this.showPage = true;

            let apiUrl = '/api/blog-post';
            let method = 'POST'

            if(this.id) {
                apiUrl = '/api/blog-post/'+ this.id;
                method = 'PUT'
            }

            axios.post(apiUrl, {
                pageLang: this.pageLangSelect,
                pageStatus: this.pageStatus,
                pageName: this.pageName,
                pageContent: this.pageContent,
                pageTitle: this.pageTitle,
                pageDescription: this.pageDescription,
                pageImagePreview: this.pageImagePreview,
                pageCategories: this.pageCategories,
                '_method': method,
            }).then(response => {
                if(response.status === 200){
                    window.location.href = "/manager/blog/posts/" + response.data.id;
                    this.showPage = false;
                }
            }).catch(error => {
                this.showPage = true;
                this.showError = true;
                console.log(error);
            });
        },

        //Получаем данные страницы
        getPageData() {
            let apiUrl = '/api/blog-post/'+ this.id +'/edit';
            if(this.pageLang !== ''){
                apiUrl = '/api/blog-post/'+ this.id +'/edit?lang=' + this.pageLang;
            }
            axios
                .get(apiUrl)
                .then(response => {
                    if(response.status === 200){
                        this.pageId=response.data.id;
                        this.pageStatus=response.data.status;
                        this.pageSlug = '/' + response.data.slug;
                        this.pageName=response.data.name;
                        this.pageLangMainName=response.data.nameMainLang;
                        this.pageContent=response.data.contents;
                        this.pageTitle=response.data.title;
                        this.pageDescription=response.data.description;
                        this.pageImagePreview=response.data.previewImage;
                        this.listLanguages=response.data.listLanguages;
                        this.pageLang = this.pageLang === '' ? response.data.listLanguages.langMain.prefix : this.pageLang;
                        this.pageLangSelect = this.pageLangSelect === '' ? response.data.listLanguages.langMain.prefix : this.pageLang;
                        this.pageCategories = response.data.pageCategories;
                        setTimeout(()=>{this.showPage = true;},1000);
                    }
                })
                .catch(error => {
                    this.showPage = false;
                    this.showError = true;
                    console.log(error);
                });
        },

        //Получаем список категорий
        getListCategories() {
            let apiUrl = '/api/blog-category/list';
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

        //Обновление контента
        handleDataUpdate(data) {
            this.pageContent = data.value;
        },

        //Выбрать языковую версию страниц
        selectLang(){
            if(this.pageLangSelect === this.pageLang){}
            else if(this.pageLangSelect === this.listLanguages.langMain.prefix){
                window.location.href = "/manager/blog/posts/" + this.pageId;
            }else{
                window.location.href = "/manager/blog/posts/" + this.pageId + '/' + this.pageLangSelect;
            }
        },

        //Загрузка превью изображения
        imagePreviewUploads() {
            const formData = new FormData();
            formData.append('file', this.$refs.file.files[0]);
            formData.append('folder', this.folder);
            axios
                .post('/api/upload-preview-image', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    if (response.status === 200) {
                        this.pageImagePreview = response.data;
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        },

        //Удалить превью изображение
        imagePreviewDelete(){
            this.pageImagePreview = '';
        }
    }
}
</script>
