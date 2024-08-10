<template>
<div class="todolistcontainer">
    <div class="heading">
        <h2 class="title">Todo List</h2>
        <add-item-form
        v-on:reloadList="getlist()"
        />
    </div>
    <list-view :items="items"
    v-on:reloadList="getlist()"
    />
</div>
</template>
<script>
import axios from 'axios';
import { ref } from 'vue';
import addItemForm from './addItemForm.vue'
import listView from './listView.vue'
export default {
  components: { addItemForm,listView },
    setup() {
        const items = ref([]);

       
        const getlist = () => {
            axios.get('api/items')
            .then(response => {
                items.value = response.data;
                console.log('taked')
            })
            .catch(error => {
                 console.log(error);
            })
        }
        getlist()
        return { items,getlist}
    },
}
</script>
<style scoped>
.todolistcontainer{
    width:350px;
    margin: auto;
}
.heading{
    background-color: #e6e6e6;
    padding: 10px;
}
.title{
    text-align: center;
}
</style>