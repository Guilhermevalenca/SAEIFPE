<template>
    <Head title="depoimento" />
    <Default>
        <v-card-title class="d-flex align-center flex-row justify-center">
            Depoimentos
        </v-card-title>
        <v-container>
        </v-container>
        <v-main class="d-flex align-center flex-column justify-center pb-16">
            <v-container class="pa-0">
                <v-container class="d-flex justify-end">
                    <v-btn @click="showFormAdd() ; changeButton" color="tertiary" :prepend-icon="changeButton ? 'mdi-plus' : '' ">{{  changeButton ? 'Adicionar Depoimento' : 'Voltar' }}</v-btn>
                </v-container>
                <v-container class="d-flex justify-center" v-if="showAddDeposition">
                    <AddDeposition @send="showDepositions()" @cancelAction="showDepositions()"/>
                </v-container>
                <v-container class="d-flex align-center flex-column justify-center pt-10" v-if="showViewDepositions">
                    <ViewDepositions :data="data"/>
                </v-container>
            </v-container>
        </v-main>
    </Default>
</template>
<script>
import Default from "@/Layouts/default/Default.vue";
import AddDeposition from "@/Components/depositions/AddDeposition.vue";
import ViewDepositions from "@/Components/depositions/ViewDepositions.vue";
import { Head } from '@inertiajs/vue3';

export default {
    props: {
        data: Object,
    },
    name: "Depositions",
    components: {ViewDepositions, AddDeposition, Default, Head},
    data(){
        return{
            showAddDeposition: false,
            showViewDepositions: true,
            changeButton: true,
        }
    },
    methods:{
        showFormAdd(){
            if(!this.showAddDeposition){
                this.showAddDeposition = true
                this.showViewDepositions = false
                this.changeButton = false
            }else{
                this.showAddDeposition = false
                this.showViewDepositions = true
                this.changeButton = true
            }
        },
        showDepositions(){
            this.showViewDepositions = true
            this.showAddDeposition = false
            this.changeButton = true
        },
    },
    created() {
        console.log(this.data);
    }
}
</script>

