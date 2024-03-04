<template>
    <form @submit.prevent="submit" class="d-flex flex-column w-50">
        <input type="email" name="email" v-model="email" required placeholder="E-mail">
        <input type="password" name="password" v-model="password" required placeholder="Password">
        <input type="submit" value="Войти">
    </form>
</template>

<script>
    import { mapActions } from 'vuex'
    export default {
        data(){
            return {
                email: null,
                password: null
            }
        },
        methods:{
            ...mapActions('auth', ['LOGIN']),
            submit(){
                const data = {
                    email: this.email,
                    password: this.password
                }
                this.LOGIN(data)
            }
        }
    }
</script>

<style>

</style>