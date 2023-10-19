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
                    :to="{ name: 'pages-create'}"
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
                                        <th v-if="listLanguages.langList && listLanguages.langList.length > 1" class="text-center" style="width: 120px;">
                                            Языки
                                        </th>
                                        <th style="width: 150px;">
                                            Дата
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    <tr
                                        v-for="(item, index) in listPagesNonDelete"
                                        :key="index"
                                        @mouseover="showActions(item.id)"
                                        @mouseleave="hideActions()"
                                    >
                                        <td class="text-center" style="vertical-align: top;padding-top: 6px;font-size: 16px;">
                                            {{ item.id }}
                                        </td>
                                        <td class="td-name">
                                            <router-link
                                                :to="{ name: 'pages-edit', params:{'id':item.id} }"
                                                class="name"
                                            >
                                                {{ item.name }}
                                            </router-link>
                                            <div class="action-list" v-if="showActionsId === item.id">
                                                <router-link
                                                :to="{ name: 'pages-edit', params:{'id':item.id} }"
                                                >
                                                    Изменить
                                                </router-link>
                                                <span>|</span>
                                                <a :href="item.slug" target="_blank">Просмотреть</a>
                                            </div>
                                        </td>
                                        <td v-if="listLanguages.langList.length > 1" class="text-center">
                                            <img
                                                v-for="(lang) in item.languages"
                                                :src="lang.previewImage"
                                                :alt="lang.name"
                                                class="img-lang"
                                            >
                                        </td>
                                        <td>
                                            <div class="dateUpdate">
                                                Обновлено<br>
                                                {{item.updated_at}}
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-light">
                    <div class="card-body">
                        <div class="col-md-12 col-lg-12">
                            <div class="row justify-content-end g-0">
                                <div class="col-auto col-sm-5 mb-3">
                                    <div class="input-group">
                                        <input
                                            v-model="searchQuery"
                                            class="form-control form-control-sm shadow-none search-list"
                                            placeholder="Поиск..."
                                        >
                                        <div @click="clearSearch" class="input-group-text bg-transparent search-btn">
                                            <i class="fa-light fa-broom-wide"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-list">
                                <table class="table table-striped">
                                    <thead class="bg-200 text-900">
                                    <tr>
                                        <th
                                            @click="sortList('id')"
                                            class="text-center"
                                            style="width: 52px;"
                                        >
                                            ID
                                            <i class="fa-thin fa-sort"></i>
                                        </th>
                                        <th
                                            @click="sortList('name')"
                                        >
                                            Название
                                            <i class="fa-thin fa-sort"></i>
                                        </th>
                                        <th
                                            v-if="listLanguages.langList && listLanguages.langList.length > 1"
                                            class="text-center"
                                            style="width: 120px;"
                                        >
                                            Языки
                                        </th>
                                        <th
                                            @click="sortList('updated_at')"
                                            style="width: 150px;"
                                        >
                                            Дата
                                            <i class="fa-thin fa-sort"></i>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    <tr
                                        v-for="(item, index) in paginatedData"
                                        :key="index"
                                        @mouseover="showActions(item.id)"
                                        @mouseleave="hideActions()"
                                    >
                                        <td class="text-center" style="vertical-align: top;padding-top: 6px;font-size: 16px;">
                                            {{ item.id }}
                                        </td>
                                        <td class="td-name">
                                            <router-link
                                                :to="{ name: 'pages-edit', params:{'id':item.id} }"
                                                class="name"
                                            >
                                                {{ item.name }}
                                            </router-link>
                                            <div class="action-list" v-if="showActionsId === item.id">
                                                <router-link
                                                    :to="{ name: 'pages-edit', params:{'id':item.id} }">
                                                    Изменить
                                                </router-link>
                                                <span>|</span>
                                                <span @click="deletePage(item.id)" class="red">Удалить</span>
                                                <span>|</span>
                                                <a :href="item.slug" target="_blank">Просмотреть</a>
                                            </div>
                                        </td>
                                        <td v-if="listLanguages.langList.length > 1" class="text-center">
                                            <img
                                                v-for="(lang) in item.languages"
                                                :src="lang.previewImage"
                                                :alt="lang.name"
                                                class="img-lang">
                                        </td>
                                        <td>
                                            <div class="dateUpdate">
                                                Обновлено<br>
                                                {{item.updated_at}}
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                    <ul v-if="this.searchQuery === ''" class="pagination">
                                        <li class="page-item">
                                            <button @click="previousPage" :disabled="currentPage === 1">
                                                <span aria-hidden="true">&laquo;</span>
                                            </button>
                                        </li>
                                        <li v-for="page in pageArray" :key="page" class="page-item" :class="{ active: page === currentPage }">
                                            <button @click="changePage(page)">{{ page }}</button>
                                        </li>
                                        <li class="page-item">
                                            <button
                                                @click="nextPage"
                                                :disabled="currentPage * itemsPerPage >= listPages.length">
                                                <span aria-hidden="true">&raquo;</span>
                                            </button>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            listPagesNonDelete: [], // Данные не удаляемые страницы
            listPages: [],          // Данные удаляемые страницы
            listLanguages: [],      // Набор языков

            searchQuery: '',        //Поисковый запрос
            sortedByASC: true,      //Тип сортировки ASC/DESC

            currentPage: 1,         // Текущая страница
            itemsPerPage: 20,       // Количество элементов на странице
            totalPages: 0,          // Общее количество страниц
            pageArray: [],          // Массив страниц

            showPage: false,        //Показ страницы/прелоадера
            showError: false,       //Показ ошибки данных
            showActionsId: null,    //Раскрытия меню в таблице
        };
    },
    computed: {
        paginatedData() {
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;

            if (this.searchQuery === '') {
                return this.listPages.slice(startIndex, endIndex);
            }

            return this.listPages.filter(item => {
                return item.name.toLowerCase().includes(this.searchQuery.toLowerCase())
            })
        },
    },
    created() {
        this.getPageData();
    },
    watch: {
        paginatedData() {
            this.calculateTotalPages();
        },
    },
    methods: {
        getPageData() {
            let apiUrl = '/api/page';
            axios
                .get(apiUrl)
                .then(response => {
                    if(response.status === 200){
                        this.listPagesNonDelete = response.data.listPagesNonDeleted;
                        this.listPages= response.data.listPages;
                        this.listLanguages = response.data.listLanguages;
                        this.showPage = true;
                    }
                })
                .catch(error => {
                    this.showPage = false;
                    this.showError = true;
                    console.log(error);
                });
        },

        deletePage($id) {
            let apiUrl = '/api/page/' + $id;
            let method = 'DELETE';
            axios.post(apiUrl, { '_method': method })
                .then(response => {
                    if (response.status === 200) {
                        const index = this.listPages.findIndex(item => item.id === $id);
                        if (index !== -1) {
                            this.listPages.splice(index, 1);
                        }
                        this.paginatedData = this.listPages.slice(
                            (this.currentPage - 1) * this.itemsPerPage,
                            this.currentPage * this.itemsPerPage
                        );
                    }
                })
                .catch(error => {
                    this.showPage = true;
                    this.showError = true;
                    console.log(error);
                });
        },

        sortList(sortBy) {
            if (this.sortedByASC) {
                this.listPages.sort((x, y) => (x[sortBy] > y[sortBy] ? -1 : 1));
                this.sortedByASC = false;
            } else {
                this.listPages.sort((x, y) => (x[sortBy] < y[sortBy] ? -1 : 1));
                this.sortedByASC = true;
            }
        },

        clearSearch(){
            this.searchQuery = '';
        },

        calculateTotalPages() {
            this.totalPages = Math.ceil(this.listPages.length / this.itemsPerPage);
            this.pageArray = Array.from({ length: this.totalPages }, (_, i) => i + 1);
        },

        previousPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },
        changePage(page) {
            if (page >= 1 && page <= this.totalPages) {
                this.currentPage = page;
            }
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
