<template>
    <div>
        <div v-for="(item,index) in items" :key="index">
            <list-item
            :item="item"
            class="item"
            v-on:itemchanged="$emit(`reloadlist`)"
            />
        </div>
    </div>
</template>
<script>
import ListItem from './listItem.vue';


export default {
    props:['items'],
    components:{
        ListItem
    },
    setup() {
        
    },
}
</script>
<style>
.item{
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>