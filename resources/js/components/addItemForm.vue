<template>
    <div class="addItem">
        <input type="text" v-model="item.name" />
        <font-awesome-icon 
        icon="plus-square" 
       @click="addItem()"
        :class="[item.name ? `active`:`inactive`,`plus`]"
        />
    </div>
</template>
<script>
import axios from 'axios';
import { ref } from 'vue';
export default {
    setup() {
      const item = ref({
            name: ''
        });
       

        return {item  }
   
},

methods:{
        addItem() {
            if(this.item.name = ''){
                return;
            }
            axios.post('/api/item/store', {
                item:this.item.name
            })
            .then(response => {
                if(response.status == 201){
                    this.item.name = ''
                }
            })
            .catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>
.addItem{
    display: flex;
    justify-content: center;
    align-items: center;

}

input {
background-color: #f7f7f7;
border: 0px;
margin-right: 10px;
outline: none;
padding: 5px;
width: 100%;
}
.plus{
    font-size: 20px;
}
.active{
    color:#00CE25;
}
.inactive{
    color:#999999
}
</style>