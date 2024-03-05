<template>
    <button @click="submit()">Отправить SMS</button>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    props: ['phone', 'name'],
    methods: {
        ...mapActions('sms', ['SEND_SMS']),
        submit(){
            this.SEND_SMS({
                phone: this.phone,
                name: this.name
            })
        }
    }
}
</script>

<style scoped>
</style>