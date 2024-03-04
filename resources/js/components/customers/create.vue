<template>
    <form @submit.prevent="submit">
        <div class="d-flex flex-column">
            <label for="">Имя</label>
            <input type="text" name="firstname" v-model="firstname" placeholder="Иван" required>
        </div>
        <div class="d-flex flex-column">
            <label for="">Фамилия</label>
            <input type="text" name="lastname" v-model="lastname" placeholder="Иванов" required>
        </div>
        <div class="d-flex flex-column">
            <label for="">Дата рождения</label>
            <input type="date" name="birthdate" v-model="birthdate" required>
        </div>
        <div class="d-flex flex-column">
            <label for="">Телефон</label>
            <input type="tel" name="phone" v-model="phone" placeholder="+79000010000" required>
        </div>
        <input type="submit" value="Добавить">
    </form>
</template>
<script>
    import { mapActions } from 'vuex'
    export default {
        data(){
            return {
                firstname: null,
                lastname: null,
                birthdate: null,
                phone: null
            }
        },
        methods:{
            ...mapActions('customers', ['CREATE']),
            submit(){
                const data = {
                    firstname: this.firstname,
                    lastname: this.lastname,
                    birthdate: this.birthdate,
                    phone: this.phone
                }
                this.CREATE(data).then((response)=>{
                    this.$router.push({name: 'customers'})
                })
            }
        }
    }
</script>
<style scoped>
form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
</style>