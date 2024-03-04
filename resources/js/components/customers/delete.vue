<template>
    <i @click="DELETE(this.id)" class="fa-solid fa-trash delete-button"></i>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    props: ['id'],
    methods: {
        ...mapActions('customers', [
            'DELETE'
        ])
    }
}
</script>

<style scoped>
    .delete-button{
        color: #ff6666;
        cursor: pointer;
    }
    .delete-button:hover {
        color: #ff0000;
    }
</style>