<template>
<v-container v-for='deposition in data' :key="deposition.id"  id="Depositions" class="d-flex flex-column justify-center pa-0 h-auto rounded-xl" >
    <v-card  v-for="(value, index) in deposition" :key="index" class="d-flex flex-column justify-center pa-10 mb-4 h-auto rounded-xl" variant="flat" :style="'border: 1px solid #2E8429;'">
        <v-card-item class="d-flex justify-end ma-0 pa-0">
            <v-icon
                end
                icon="mdi mdi-school"
            ></v-icon>
            <span>{{ deposition[index].user[1].course }}</span>
        </v-card-item>
        <v-card-text class="d-flex flex-row">
            <v-avatar v-slot="auto"
                      color="pink"
                      image= "{{ deposition[index].user[0].profile_picture }}"
            >
            </v-avatar>
            <v-card-title>
                {{ deposition[index].user[0].name}}
            </v-card-title>
        </v-card-text>
        <v-card-text>
            {{deposition[index].content}}
        </v-card-text>
    </v-card>
</v-container>
</template>
<script>
export default {
    props:{
        data: Object,
    },
    name: "ViewDepositions",
   data(){
        return{
        }
   }
}
</script>


<style scoped lang="scss">
#Depositions{
    .mdi:before, .mdi-set {
        color:#2E8429;
    }
}
</style>
