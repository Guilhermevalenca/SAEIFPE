<template>
    <Head title="Formulário" />
    <Default>
       <v-container class="d-flex justify-center">

         <v-card width="1300px">
           <v-card-title class="d-flex justify-center">Formulários</v-card-title>
           <v-card-actions class="d-flex justify-end">
             <v-btn color="secondary" variant="elevated" @click="isCreateForms = !isCreateForms">{{ isCreateForms ? 'Meus Formulários' : 'Criar formulário' }}</v-btn>
           </v-card-actions>
           <v-card-text>
             <div v-if="! isCreateForms" class="d-flex justify-center">
               <MyFormsCreated :data="data" />
             </div>
             <div v-else class="d-flex justify-center">
               <CreateForms @created_form_success="isCreateForms = false" @cancelCreateForm="isCreateForms = false" />
             </div>
           </v-card-text>
         </v-card>

       </v-container>
      <template #footer v-if="! isCreateForms">
        <v-card class="d-flex justify-center">
          <v-row>
            <v-col />
            <v-col>
              <v-pagination v-model="page.current" :length="page.all" rounded="circle" />
            </v-col>
            <v-col />
          </v-row>
        </v-card>
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
                window.location.href = route('forms_index', {page: $new.current});
            },
            deep: true
        }
    },
    created() {

    },
}
</script>
