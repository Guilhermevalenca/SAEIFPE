<template>
   <Default>
       <v-card-title class="d-flex align-center flex-row justify-center">
           Depoimentos para análise
       </v-card-title>
       <v-card class="d-flex align-center flex-column justify-center pb-16 ma-0 pa-0" variant="flat" color="transparent">
           <v-card variant="flat" color="transparent" :class="[$phoneDisplay ? 'w-100' : $screenMediumDisplay ? 'w-75' : 'w-50']">
               <v-card class="pa-0 ma-0 " color="transparent" variant="flat">
                   <v-container class="d-flex justify-end">
                       <Link :href="route('depoimentos_mural')">
                           <v-btn color="secondary" variant="flat">Voltar para os depoimentos</v-btn>
                       </Link>
                   </v-container>
                   <v-container class="d-flex align-center flex-column justify-center pt-10">
                       <AdmPage :data="data" :currentPage="currentPage" :lastPage="lastPage"/>
                   </v-container>

               </v-card>
           </v-card>
       </v-card>
   </Default>
</template>
<script>
import AdmPage from "@/Components/depositions/AdmPage.vue";
import Default from "@/Layouts/default/Default.vue";
import {Link} from "@inertiajs/vue3";

export default {
    props:{
        data:Object,
        lastPage: Number,
        currentPage: Number
    },
    name: "DepositionsAdmPage",
    components: {Link, Default, AdmPage},
    data(){
        return{
            changeButtonADM: true
        }
    },
}
</script>

<style scoped>

</style>
