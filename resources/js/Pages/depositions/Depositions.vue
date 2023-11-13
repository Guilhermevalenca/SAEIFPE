<template>
<Default>
    <v-card-title class="d-flex align-center flex-row justify-center">
        Depoimentos
    </v-card-title>
    <v-container>
    </v-container>
    <v-main class="d-flex align-center flex-column justify-center pb-16">
        <v-container class="d-flex justify-end w-75">
        <v-btn @click="showFormAdd() ; changeTheButton()">{{ changeButton }}</v-btn>
        </v-container>
        <v-container class="d-flex justify-center" v-if="showAddDeposition">
        <AddDeposition @send="showDepositions()" @cancel="showDepositions()"/>
        </v-container>
        <v-container class="d-flex align-center flex-column justify-center pt-10" v-if="showViewDepositions">
        <ViewDepositions :data="data"/>
        </v-container>
    </v-main>
</Default>
</template>
<script>
import Default from "@/Layouts/default/Default.vue";
import AddDeposition from "@/Components/depositions/AddDeposition.vue";
import ViewDepositions from "@/Components/depositions/ViewDepositions.vue";

export default {
    props: {
        data: Object,
    },
    name: "Depositions",
    components: {ViewDepositions, AddDeposition, Default},
    data(){
        return{
            showAddDeposition: false,
            showViewDepositions: true,
            changeButton: "Adicionar Depoimento"
        }
    },
    methods:{
      showFormAdd(){
          if(this.showAddDeposition != true){
              this.showAddDeposition = true
              this.showViewDepositions = false
          }else{
              this.showAddDeposition = false
              this.showViewDepositions = true
          }
      },
          showDepositions(){
              this.showViewDepositions = true
              this.showAddDeposition = false
              this.changeButton = "Adicionar Depoimento"
          },
        changeTheButton(){
          if(this.showAddDeposition == true){
              this.changeButton = "Voltar"
          }else{
              this.changeButton = "Adicionar Depoimento"
          }
        }
    },
    created() {
        console.log(this.data);
    }
}
</script>

