<template>
    <div class="addItem">
        <input type="text" v-model="item.name" />
        <font-awesome-icon 
            icon="plus-square" 
            @click="addItem"
            :class="[item.name ? 'active' : 'inactive', 'plus']"
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

        const addItem = () => {
            if (item.value.name === '') {
                return;
            }
            axios.post('/api/item/store', {
                 name: item.value.name 

            })
            .then(response => {
                if (response.status === 201) {
                    item.value.name = '';
                    console.log('inserted')
                }
            })
            .catch(error => {
                console.log(error);
            });
        };

        return { item, addItem };
    }
}
</script>

<style scoped>
.addItem {
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    background-color: #f7f7f7;
    border: 0;
    margin-right: 10px;
    outline: none;
    padding: 5px;
    width: 100%;
}

.plus {
    font-size: 20px;
}

.active {
    color: #00CE25;
}

.inactive {
    color: #999999;
}
</style>
