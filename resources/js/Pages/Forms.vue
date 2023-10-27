<template>
    <Default>

        <v-card>
            <v-card-title class="d-flex justify-center">Formulários</v-card-title>
            <v-card-actions class="d-flex justify-end">
                <v-btn color="secondary" variant="outlined" @click="isCreateForms = !isCreateForms">{{ isCreateForms ? 'Meus Formulários' : 'Criar formulário' }}</v-btn>
            </v-card-actions>
            <v-card-text>
                <div v-show="! isCreateForms">
                    <MyFormsCreated v-if="! loadingListForms" :data="data" />
                </div>
                <div v-show="isCreateForms">
                    <CreateForms @created_form_success="isCreateForms = false" />
                </div>
            </v-card-text>
        </v-card>
        <v-card>
            <v-card-title class="d-flex justify-center">Formulários</v-card-title>
            <v-card-subtitle>Aqui estão alguns formulários que podem ser respondidos</v-card-subtitle>
            <v-card-text>
                <ShowFormsForUsers v-if="! loadingListForms" :data="data" />
            </v-card-text>
        </v-card>

    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import ShowFormsForUsers from "@/Components/forms/otherUsersForms/ShowFormsForUsers.vue";
import MyFormsCreated from "@/Components/forms/admUsersForms/MyFormsCreated.vue";
import CreateForms from "@/Components/forms/admUsersForms/CreateForms.vue";
export default {
    name: "Forms",
    components: {Default, ShowFormsForUsers, MyFormsCreated, CreateForms},
    data() {
        return {
            isCreateForms: false,
            loadingListForms: false
        }
    },
    props: {
        data: Object
    },
    created() {
        console.log(this.data);
    },
    watch: {
        data: {
            handler() {
                this.loadingListForms = true;
                this.isCreateForms = false;
                this.loadingListForms = false;
            },
            deep: true
        }
    }
}
</script>


<style scoped>

</style>
