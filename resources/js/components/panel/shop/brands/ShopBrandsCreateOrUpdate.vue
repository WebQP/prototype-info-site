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
                    :to="{ name: 'shop-brand-list'}"
                >
                    <i class="fa-duotone fa-arrow-right"></i> магазин - бренды
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
import draggable from 'vuedraggable'
import { useVuelidate } from '@vuelidate/core'
import { helpers, required } from '@vuelidate/validators'
export default {
    components: {
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
            }
        }
    },
    data(){
        return {
            pageLang: '',
            pageLangSelect: '',
            pageLangMainName: '',
            pageStatus: 1,
            pageId: '',
            pageSlug: '',
            pageName: '',
            pageContent: '',
            pageTitle: '',
            pageDescription: '',
            pageImagePreview: '',
            listLanguages: [],
            showPage: false,
            showError: false,

            pageListSlider: [],
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
    },
    created() {
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

            let apiUrl = '/api/shop-brand';
            let method = 'POST'

            if(this.id) {
                apiUrl = '/api/shop-brand/'+ this.id;
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
                pageListSlider: this.pageListSlider,
                '_method': method,
            }).then(response => {
                if(response.status === 200){
                    if(this.pageLang === '' || this.pageLangSelect === this.listLanguages.langMain.prefix){
                        window.location.href = "/manager/shop/brands/" + response.data.id;
                    }else{
                        window.location.href = "/manager/shop/brands/" + this.id + '/' + this.pageLangSelect;
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
            let apiUrl = '/api/shop-brand/'+ this.id +'/edit';
            if(this.pageLang !== ''){
                apiUrl = '/api/shop-brand/'+ this.id +'/edit?lang=' + this.pageLang;
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
                        this.pageListSlider = response.data.listSlider;
                        setTimeout(()=>{this.showPage = true;},1000);
                    }
                })
                .catch(error => {
                    this.showPage = false;
                    this.showError = true;
                    console.log(error);
                });
        },

        handleDataUpdate(data) {
            this.pageContent = data.value;
        },

        selectLang(){
            if(this.pageLangSelect === this.pageLang){}
            else if(this.pageLangSelect === this.listLanguages.langMain.prefix){
                window.location.href = "/manager/shop/brands/" + this.pageId;
            }else{
                window.location.href = "/manager/shop/brands/" + this.pageId + '/' + this.pageLangSelect;
            }
        },

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

        imagePreviewDelete(){
            this.pageImagePreview = '';
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
