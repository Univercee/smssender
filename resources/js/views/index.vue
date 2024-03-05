<template>
    <form @submit.prevent="submit">
        <div class="d-flex flex-column">
            <label for="">E-mail</label>
            <input type="email" name="email" v-model="email" required placeholder="test@gmail.com">
        </div>
        <div class="d-flex flex-column">
            <label for="">Пароль</label>
            <input type="password" name="password" v-model="password" required placeholder="********">
        </div>
        <input type="submit" value="Войти" style="margin-top: 20px;">
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

<style scoped>
form{
    display: flex;
    flex-direction: column;
    width: 50%;
    gap: 1rem;
}
</style>