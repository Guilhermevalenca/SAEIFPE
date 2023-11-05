<template>
    <Head title="Formulário" />
    <Default>
        <v-card>
            <v-card-title class="d-flex justify-center">Formulários</v-card-title>
            <v-card-actions class="d-flex justify-end">
                <v-btn color="secondary" variant="outlined" @click="isCreateForms = !isCreateForms">{{ isCreateForms ? 'Meus Formulários' : 'Criar formulário' }}</v-btn>
            </v-card-actions>
            <v-card-text>
                <div v-show="! isCreateForms">
                    <MyFormsCreated :data="data" />
                </div>
                <div v-show="isCreateForms">
                    <CreateForms @created_form_success="isCreateForms = false" />
                </div>
            </v-card-text>
        </v-card>
        <template #footer>
            <v-pagination v-model="page.current" :length="page.all" rounded="circle" />
        </template>
    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import ShowFormsForUsers from "@/Components/forms/otherUsersForms/ShowFormsForUsers.vue";
import MyFormsCreated from "@/Components/forms/admUsersForms/MyFormsCreated.vue";
import CreateForms from "@/Components/forms/admUsersForms/CreateForms.vue";
import {Link, Head} from '@inertiajs/vue3';
export default {
    name: "FormsAdm",
    components: {Default, ShowFormsForUsers, MyFormsCreated, CreateForms, Link, Head},
    data() {
        return {
            isCreateForms: false,
            page: {
                current: this.data.page.current_page,
                all: this.data.page.last_page
            }
        }
    },
    props: {
        data: Object
    },
    watch: {
        data: {
            handler() {
                this.isCreateForms = false;
            },
            deep: true
        },
        page: {
            handler($new) {

            },
            deep: true
        }
    },
    created() {
        console.log(this.data);
    }
}
</script>
