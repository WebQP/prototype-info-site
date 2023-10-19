<template>

    <alert-error v-if="showError" />
    <preloader v-if="!showPage" />

    <div v-show="showPage" class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3>{{$route.meta.namePage}}</h3>
            </div>
            <div class="col-auto ms-auto text-end mt-n1">
                <router-link
                    :to="{ name: 'blog-categories-create'}"
                    class="btn btn-primary btn-add"
                >
                    Добавить
                </router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                 <div class="card bg-light">
                    <div class="card-body">
                        <div class="col-md-12 col-lg-12">
                            <div class="table-list">
                                <table class="table table-striped">
                                    <thead class="bg-200 text-900">
                                    <tr>
                                        <th class="text-center" style="width: 52px;">ID</th>
                                        <th>Название</th>
                                        <th
                                            v-if="listLanguages.langList && listLanguages.langList.length > 1"
                                            class="text-center"
                                            style="width: 120px;"
                                        >
                                            Языки
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody v-if="listPages.length > 0" class="list">
                                    <recursion-categories-table
                                        v-for="item in listPages"
                                        :key="item.id"
                                        :table-data="item"
                                        :languages-data="listLanguages.langList"
                                    />
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RecursionCategoriesTable from "../../assets/recursions/RecursionCategoriesTable.vue";

export default {
    components: {RecursionCategoriesTable},
    data() {
        return {
            listPages: [],          // Данные удаляемые страницы
            listLanguages: [],      // Набор языков

            showPage: false,        //Показ страницы/прелоадера
            showError: false,       //Показ ошибки данных
            showActionsId: null,    //Раскрытия меню в таблице
        };
    },
    created() {
        this.getPageData();
    },
    methods: {
        getPageData() {
            let apiUrl = '/api/blog-category';
            axios
                .get(apiUrl)
                .then(response => {
                    if(response.status === 200){
                        this.listPages= response.data.listPages;
                        this.listLanguages = response.data.listLanguages;
                        setTimeout(()=>{this.showPage = true;},1000);
                    }
                })
                .catch(error => {
                    this.showPage = false;
                    this.showError = true;
                    console.log(error);
                });
        },
        showActions(itemId) {
            this.showActionsId = itemId;
        },
        hideActions() {
            this.showActionsId = null;
        },
    },
};
</script>
