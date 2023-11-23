<template>
    <Head title="Depoimento" />
    <Default>
        <v-card-title class="d-flex align-center flex-row justify-center">
            Depoimentos
        </v-card-title>
        <v-card class="d-flex align-center flex-column justify-center pb-16 ma-0 pa-0" variant="flat" color="transparent">
            <v-card variant="flat" color="transparent" :class="[$phoneDisplay ? 'w-100' : $screenMediumDisplay ? 'w-75' : 'w-50']">
                <v-card class="pa-0 ma-0 " color="transparent" variant="flat">
                    <v-container class="d-flex justify-end" v-if="$page.props.auth.user !== null && $page.props.auth.user.role === 'graduate'">
                        <v-btn @click="changeButton = !changeButton" color="secondary" variant="flat" :prepend-icon="changeButton ? 'mdi-plus' : '' ">{{  changeButton ? 'Adicionar Depoimento' : 'Voltar' }}</v-btn>
                    </v-container>
                    <v-container class="d-flex align-center flex-column justify-center" v-if="!changeButton">
                        <AddDeposition @send="changeButton = true" @cancelAction="changeButton = true"/>
                    </v-container>
                    <v-container class="d-flex align-center flex-column justify-center pt-10" v-else>
                        <ViewDepositions :data="data" :currentPage="currentPage" :lastPage="lastPage"/>
                    </v-container>
                </v-card>
            </v-card>
        </v-card>
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
        lastPage: Number,
        currentPage: Number
    },
    name: "Depositions",
    components: {ViewDepositions, AddDeposition, Default, Head},
    data(){
        return{
            changeButton: true,
        }
    },
    methods:{

    },
    created() {
        console.log(this.lastPage,this.currentPage)
        console.log(this.data);
    }
}
</script>

