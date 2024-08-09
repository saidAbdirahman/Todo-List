<template>
   <div class="item">
    <input type="checkbox"
    @change="updateCheck()"
    v-model="item.completed" />
   <span> {{ item.name }}</span>
   </div>
</template>
<script>


export default {
    props: ['item'],
    setup() {
        
    },
}
</script>
