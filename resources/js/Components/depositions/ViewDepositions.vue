<template>
<v-card id="Depoimentos" class="d-flex flex-column justify-center pa-10 w-75 h-auto rounded-xl" variant="flat" :style="'border: 1px solid #2E8429;'">
    <v-card-item class="d-flex justify-end ma-0 pa-0">
        <v-icon
            end
            icon="mdi mdi-school"
        ></v-icon>
        <span>ADM</span>
    </v-card-item>
    <v-card-text class="d-flex flex-row">
    <v-avatar v-slot="auto"
              color="black"
              image= "https://med.virginia.edu/diabetes-technology/wp-content/uploads/sites/265/2020/10/Blank-Avatar.png"
    >
    </v-avatar>
       <v-card-title>
           juju do canavial
       </v-card-title>
    </v-card-text>
<v-card-text>
    asjhfkhdskhfkdshkhkdshkghdkshkdah
</v-card-text>
</v-card>
</template>
<script>
export default {
    name: "ViewDepositions",
    data(){
        return{
            depositions:{

            }
        }
    },

}
</script>


<style scoped lang="scss">
#Depoimentos{
    .mdi:before, .mdi-set {
        color:#2E8429;
    }
}
</style>
