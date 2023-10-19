<template>
    <div class="form-check">
        <input
            class="form-check-input"
            type="checkbox"
            :value="node.id"
            :id="'flexCheckDefault'+node.id"
            @change="handleCheckboxChange"
            :checked="isNodeChecked"
        >
        <label
            class="form-check-label"
            :for="'flexCheckDefault'+node.id"
        >
            {{nameOption(node.name, node.level)}}
        </label>
    </div>
    <node
        v-for="child in node.children"
        :node="child"
        :listCategories="listCategories"
        @checkbox-change="updateListCategoriesPost"
    />
</template>

<script>
export default {
    name: 'node',
    props: {
        node: Object,
        listCategories: Array,
    },
    methods: {
        nameOption(name, level) {
            let nameOption = name;
            while (level) {
                nameOption = '— ' + nameOption;
                level--;
            }
            return nameOption;
        },


        updateListCategoriesPost(id) {
            this.$emit('checkbox-change', id);
        },

        handleCheckboxChange() {
            this.$emit('checkbox-change', this.node.id);
        },
    },
    computed: {
        isNodeChecked() {
            return this.listCategories.includes(this.node.id);
        },
    },
};
</script>
