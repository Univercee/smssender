<template>
    <div class="wrapper">
        <notification></notification>
        <router-view></router-view>
    </div>
</template>

<script>
    import { mapActions, mapGetters, mapMutations } from 'vuex'
    export default {
        async mounted(){
            if(!sessionStorage.getItem('token')){
                this.logout()
            }
            if(sessionStorage.getItem('token') && !this.is_auth){
                await this.CHECK_AUTH();
            }
        },
        computed:{
            ...mapGetters('auth', ['is_auth'])
        },
        methods:{
            ...mapActions('auth', ['CHECK_AUTH']),
            ...mapMutations('auth', ['logout'])
        }
    }
</script>

<style>

</style>