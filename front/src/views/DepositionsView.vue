<template>
    <v-dialog persistent :width="phoneDisplay ? 'auto' : '900px'" v-model="messageAlert">
    <DepositionsAlert :phoneDisplay="phoneDisplay" @closeAlert="messageAlert = false" />
    </v-dialog>
    <AddDepositions/>
    <ListDepositions/>

</template>

<script>
import DepositionsAlert from '@/components/depositions/alerts/DepositionsAlert.vue'
import AddDepositions from '@/components/depositions/AddDepositions.vue';
import ListDepositions from '@/components/depositions/ListDepositions.vue';
export default{
    name: "DepositionsView",
    components:{
        DepositionsAlert,
        AddDepositions,
        ListDepositions
        },

        data(){
            return {
            messageAlert: true,
            phoneDisplay: window.innerWidth <= 800
        }
    },
}
</script>

<style scoped>

</style>
