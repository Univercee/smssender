<template>
    <div v-if="is_auth" class="customers-wrapper">
        <div class="d-flex flex-column">
            <div class="align-self-end">
                <button class="btn btn-danger" @click="logout">Выйти</button>
            </div>
            <div>
                <div class="align-self-center">
                    <router-link :to="{ name: 'customer-create' }">Добавить запись</router-link>
                </div>
                <div>
                    <p>Баланс: {{ balance }}</p>
                </div>
            </div>
        </div>
        <table v-if="customers.length">
        <thead>
            <tr>
                <th>
                    <div class="d-flex align-items-center justify-content-center" style="gap: .3rem;">
                        Имя
                    </div>
                </th>
                <th>
                    <div class="d-flex align-items-center justify-content-center" style="gap: .3rem;">
                        Фамилия
                    </div>
                </th>
                <th>
                    <div class="d-flex align-items-center justify-content-center" style="gap: .3rem;">
                        Телефон
                    </div>
                </th>
                <th>
                    <div class="d-flex align-items-center justify-content-center" style="gap: .3rem;">
                        Дата рождения
                    </div>
                </th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="customer in customers">
                <td><input type="text" v-model="customer.firstname" :disabled="!editModeEnabled(customer.id)"></td>
                <td><input type="text" v-model="customer.lastname" :disabled="!editModeEnabled(customer.id)"></td>
                <td><input type="tel" v-model="customer.phone" :disabled="!editModeEnabled(customer.id)"></td>
                <td><input type="date" v-model="customer.birthdate" :disabled="!editModeEnabled(customer.id)"></td>
                <td style="width:5rem">
                    <i v-if="!editModeEnabled(customer.id)" class="fa-solid button fa-pen-to-square" @click="enableEditMode(customer.id)"></i>
                    <div v-else class="d-flex justify-content-center" style="gap:.2rem">
                        <i class="fa-solid button fa-xmark text-danger" @click="cancelEdit(customer.id)"></i>
                        <i class="fa-solid button fa-check text-success" @click="submitEdit(customer)"></i>
                    </div>
                </td>
                <td><customer-delete :id="customer.id"></customer-delete></td>
                <td><send-sms :phone="customer.phone" :name="customer.firstname+' '+customer.lastname"></send-sms></td>
            </tr>
        </tbody>
    </table>
    <div v-else>
        <p>Пользователи не найдены</p>
    </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters, mapMutations } from 'vuex'
    export default {
        data(){
            return {
                edit: []
            }
        },
        async created(){
            await Promise.allSettled([
                this.FETCH_ALL(),
                this.FETCH_BALANCE()
            ])
        },
        methods:{
            ...mapActions('customers', ['FETCH_ALL', 'UPDATE']),
            ...mapActions('sms', ['FETCH_BALANCE']),
            ...mapMutations('auth', ['logout']),
            formatDate(datetime){
                let options = { year: 'numeric', month: 'numeric', day: 'numeric' };
                let date = new Date(datetime)
                return date.toLocaleDateString("en-US", options)
            },
            enableEditMode(id){
                this.edit.push(id)
            },
            editModeEnabled(id){
                return this.edit.includes(id)
            },
            cancelEdit(id){
                this.edit = this.edit.filter(el => el != id)
            },
            submitEdit(customer){
                this.UPDATE(customer)
                this.cancelEdit(customer.id)
            }
        },
        computed:{
            ...mapGetters('customers', ['customers']),
            ...mapGetters('auth', ['is_auth']),
            ...mapGetters('sms', ['balance'])
        },

    }
</script>

<style scoped>
    .customers-wrapper{
        min-width: 70%;
        max-width: 100%;
        display: flex;
        flex-direction: column;
    }
    th{
        vertical-align:middle
    }
    th, td {
        padding: 15px;
        text-align: center;
    }
    tr:nth-child(even) {
        background-color: #CCC;
    }
    tr:nth-child(odd) {
        background-color: #FFF;
    }
    i{
        cursor: pointer;
    }
</style>