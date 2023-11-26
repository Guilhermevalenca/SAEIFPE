<template>
    <!---
    <v-pagination class="ma-4" v-model="pageCurrent" :length="lastPage" rounded="circle" />
    --->
    <!---
    <v-card color="transparent"  variant=flat v-for='deposition in data' :key="deposition.id"  id="Depositions" class="d-flex flex-column justify-center pa-0 h-auto rounded-xl" >
        <v-card  v-for="(value, index) in deposition" :key="index" class="d-flex flex-column justify-center pa-10 mb-4 h-auto rounded-xl" variant="flat" :style="'border: 1px solid #2E8429;'">
                <v-card-item class="d-flex justify-end ma-0 pa-0">
                    <template #prepend>
                        <v-icon
                            end
                            icon="mdi mdi-school"
                        ></v-icon>
                    </template>
                    <v-spacer>{{ deposition[index].user[1].course }}</v-spacer>
                </v-card-item>
                <v-card-text class="d-flex flex-row">
                    <v-avatar
                        color="pink"
                        :image= "deposition[index].user[0].profile_picture"
                    >
                    </v-avatar>
                    <v-card-title>
                        {{ deposition[index].user[0].name}}
                    </v-card-title>
                </v-card-text>
                <v-card-text>
                    {{deposition[index].content}}
                    <v-img :src="deposition[index].picture">
                    </v-img>
                </v-card-text>
            </v-card>
            </v-card>
            --->
    <!----
    <v-pagination v-model="pageCurrent" :length="lastPage" rounded="circle"/>
    ---->
    <v-carousel
        height="400"
        hide-delimiters
        progress="primary"
    >
        <v-card v-for='deposition in data' :key="deposition.id"  id="Depositions" class="d-flex min-h-screen">
            <v-card v-for="(value, index) in deposition" :key="index">
                <v-carousel-item>
                    <v-sheet height="100%">
                        <v-card >
                            <v-card-title>
                                {{ deposition[index].user[0].name}}
                            </v-card-title>
                            <v-card-text>
                                {{deposition[index].content}}
                            </v-card-text>
                        </v-card>
                    </v-sheet>
                </v-carousel-item>
            </v-card>
        </v-card>
    </v-carousel>

</template>
<script>

export default {
    name: "ViewDepositions",
    props:{
        data: Object,
    },
    data(){
        return{

        }
    },
    created() {

    },
}
</script>


<style scoped lang="scss">
#Depositions{
    .mdi:before, .mdi-set {
        color:#2E8429;
    }
}

</style>
