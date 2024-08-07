<template>
<div class="todolistcontainer">
    <div class="heading">
        <h2 class="title">Todo List</h2>
        <add-item-form/>
    </div>
    <list-view/>
</div>
</template>
<script>
import addItemForm from './addItemForm.vue'
import listView from './listView.vue'
export default {
  components: { addItemForm,listView },
    setup() {
        
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