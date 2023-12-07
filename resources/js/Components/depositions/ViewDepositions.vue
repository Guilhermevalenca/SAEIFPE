<template>
    <v-container>
        <v-pagination class="ma-4" v-model="pageCurrent" :length="lastPage" rounded="circle" />
    </v-container>
    <v-card color="transparent"  variant=flat v-for='deposition in data' :key="deposition.id"  id="Depositions" class="d-flex flex-column justify-center pa-0 h-auto rounded-xl" >
        <v-card  v-for="(value, index) in deposition" :key="index" class="d-flex flex-column justify-center pa-10 mb-4 h-auto rounded-xl" variant="flat" :style="'border: 1px solid #2E8429;'">
            <v-card-actions class="d-flex justify-end" v-if="$page.props.auth.user && $page.props.auth.user.id === deposition[index].user[0].id">
                <v-menu>
                    <template #activator="{ props: menu }">
                        <v-tooltip text="Opções">
                            <template #activator="{props: tooltip}">
                                <v-btn v-bind="menu" icon="mdi-dots-vertical">
                                    <template #append>
                                        <v-icon v-bind="tooltip" />
                                    </template>
                                </v-btn>
                            </template>
                        </v-tooltip>
                    </template>
                    <v-list>
                        <v-list-item prepend-icon="mdi-trash-can" icon="mdi-trash-can">Apagar</v-list-item>
                    </v-list>
                </v-menu>
            </v-card-actions>
        <v-card-text class="d-flex flex-column align-center justify-center justify-items-center">
            <v-avatar
                size="8em"
                color="pink"
                :image= "deposition[index].user[0].profile_picture"
            >
            </v-avatar>
            <v-card-title>
                {{ deposition[index].user[0].name}}
            </v-card-title>
            <v-card-item class="d-flex justify-end ma-0 pa-0">
                <template #prepend>
                    <v-icon
                        end
                        icon="mdi mdi-school"
                    ></v-icon>
                    <span>{{ deposition[index].user[1].course }}</span>
                </template>
            </v-card-item>
        </v-card-text>
        <v-card-text class="justify-center" :style="'font-size:1rem;'">
            {{deposition[index].content}}
        </v-card-text>
        <v-card-item>
            <v-img :src="deposition[index].picture"
                   width="auto"
                   height="auto"
            >
            </v-img>
        </v-card-item>
            </v-card>
            </v-card>
            <v-container>

    <v-pagination v-model="pageCurrent" :length="lastPage" rounded="circle"/>
            </v-container>

</template>
<script>

export default {
    props:{
        data: Object,
        lastPage: Number,
         currentPage: Number
    },
    name: "ViewDepositions",
    data(){
        return{
            pageCurrent: this.currentPage,
        }
    },
    created() {
        console.log(this.data)
    },
    watch:{
        pageCurrent: {
            handler($new){
                window.location.href = route('depoimentos_mural', {
                    page: $new
                })
            },
            deep:true
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
<!---
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
                    <v-img :src="deposition[index].picture">S
                    </v-img>
                </v-card-text>
            --->
