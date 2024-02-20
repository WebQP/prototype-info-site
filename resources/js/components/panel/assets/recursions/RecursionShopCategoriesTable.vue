<template>
    <tr
        @mouseover="showActions(tableData.id)"
        @mouseleave="hideActions()"
    >
        <td class="text-center" style="vertical-align: top;padding-top: 6px;font-size: 16px;">
            {{ tableData.id }}
        </td>
        <td class="td-name">
            <router-link
                :to="{ name: 'shop-categories-edit', params:{'id':tableData.id} }"
                class="name"
            >
                {{nameOption(tableData.name,tableData.level)}}
            </router-link>
            <div class="action-list" v-if="showActionsId === tableData.id">
                <router-link
                    :to="{ name: 'shop-categories-edit', params:{'id':tableData.id} }">
                    Изменить
                </router-link>
                <span>|</span>
                <span @click="deletePage(tableData.id)" class="red">Удалить</span>
                <span>|</span>
                <a :href="tableData.slug" target="_blank">Просмотреть</a>
            </div>
        </td>
        <td v-if="languagesData && languagesData.length > 1" class="text-center">
            <img
                v-for="(lang) in tableData.languages"
                :src="lang.previewImage"
                :alt="lang.name"
                class="img-lang"
            >
        </td>
    </tr>
    <recursion-categories-table v-for="child in tableData.children" :tableData="child" :languagesData="languagesData" />
</template>

<script>
export default {
    name: 'recursion-categories-table',
    props: {
        tableData: Object,
        languagesData: Object
    },
    data(){
        return {
            showActionsId: null,
        };
    },
    methods:{
        deletePage(id) {
            let apiUrl = '/api/shop-category/' + id;
            let method = 'DELETE';
            axios.post(apiUrl, { '_method': method })
                .then(response => {
                    if (response.status === 200) {
                        window.location.href = "/manager/shop/categories";
                    }
                })
                .catch(error => {
                    this.showPage = true;
                    this.showError = true;
                    console.log(error);
                });
        },
        nameOption(name,level){
            let nameOption = name;
            while (level) {
                nameOption = '— ' + nameOption;
                level--;
            }
            return nameOption;
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
