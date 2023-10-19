<template>
    <option :value="node.id">{{nameOption(node.name,node.level)}}</option>
    <node v-for="child in node.children" :node="child"></node>
</template>

<script>
export default {
    name: 'node',
    props: {
        node: Object
    },
    methods:{
        nameOption(name,level){
            let nameOption = name;
            while (level) {
                nameOption = '— ' + nameOption;
                level--;
            }
            return nameOption;
        },
    },
};
</script>
