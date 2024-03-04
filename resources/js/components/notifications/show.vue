<template>
    <div v-if="this.message" class="notification" :class="{'success': this.type=='message', 'danger': this.type=='error'}">
        <i @click="clear()" class="fa-solid fa-xmark x-mark"></i>
        <p>{{ message }}</p>
    </div>
</template>

<script>
import { mapGetters, mapMutations } from 'vuex'
export default {
    computed: {
        ...mapGetters('notification', [
            'type',
            'message'
        ])
    },
    methods: {
        ...mapMutations('notification', [
            'clear'
        ])
    }
}
</script>

<style scoped>
 .x-mark{
    cursor: pointer;
    align-self: end !important;
 }
 .notification{
    padding: 1rem;
    border-radius: 1rem;
    display: flex;
    flex-direction: column;
    position: absolute;
    bottom: 1rem;
    right: 1rem;
 }
 .success{
    background-color: rgba(40, 167, 69, .2);
    color: rgb(40, 167, 69);
 }
 .danger{
    background-color: rgba(220, 53, 69, .2);
    color: rgb(220, 53, 69);
 }
</style>