<template>
<v-card>
    <v-card-title>
    Depoimentos dos Egressos
    </v-card-title>
</v-card>
<AddDepositions/>
<ListDepositions/>

</template>

<script>
import Swal from 'sweetalert2';
import DepositionsAlert from '@/components/user/alerts/DepositionsAlert.vue'
import AddDepositions from '@/components/depositions/AddDepositions.vue';
import ListDepositions from '@/components/depositions/ListDepositions.vue';
export default{
    name: 'DepositionsView',
    components:{
        DepositionsAlert,
        AddDepositions,
        ListDepositions
    },
    created(){
        
    }
}
</script>

<style scoped>

</style>