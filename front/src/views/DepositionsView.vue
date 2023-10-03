<template>
<v-card>
    <v-card-title>
    Depoimentos dos Egressos
    </v-card-title>
</v-card>
<AddDepositions/>

</template>

<script>
import AddDepositions from '@/components/depositions/AddDepositions.vue';

export default{
    name: 'DepositionsView',
    components:{
        AddDepositions
    }
}
</script>

<style scoped>

</style>