<template>
    <Head title="Formulário" />
    <Default>
        <v-card-title class="d-flex justify-center mt-4">Formulários</v-card-title>
        <v-container :class="$phoneDisplay ? '' : 'd-flex justify-center'">

            <v-card variant="flat" color="transparent" :class="[$phoneDisplay ? '' : $sreenMediumDisplay ? 'w-75' : 'w-50']">


                <v-card-actions class="d-flex justify-end mr-8 mt-3">

                    <SearchForms v-if="false" />

                    <v-btn color="secondary" variant="elevated" @click="isCreateForms = !isCreateForms">{{ isCreateForms ? 'Meus Formulários' : 'Criar formulário' }}</v-btn>
                </v-card-actions>

                <v-card-text>
                    <div v-if="! isCreateForms">
                        <v-container v-if="data.forms.data.length !== 0">
                            <v-pagination v-model="page.current" :length="page.all" rounded="circle" />
                        </v-container>

                        <MyFormsCreated :data="data" />

                        <v-container v-if="data.forms.data.length !== 0">
                            <v-pagination v-model="page.current" :length="page.all" rounded="circle" />
                        </v-container>
                    </div>
                    <div v-else :class="$phoneDisplay ? '' : 'd-flex justify-center'">
                        <CreateForms @created_form_success="isCreateForms = false" @cancelCreateForm="isCreateForms = false" />
                    </div>
                </v-card-text>
            </v-card>

        </v-container>
        <template #footer v-if="! isCreateForms">
        </template>
    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import ShowFormsForUsers from "@/Components/forms/otherUsersForms/ShowFormsForUsers.vue";
import MyFormsCreated from "@/Components/forms/admUsersForms/MyFormsCreated.vue";
import CreateForms from "@/Components/forms/admUsersForms/CreateForms.vue";
import SearchForms from "@/Components/forms/admUsersForms/SearchForms.vue";
import {Link, Head} from '@inertiajs/vue3';
export default {
    name: "FormsAdm",
    components: {Default, ShowFormsForUsers, MyFormsCreated, CreateForms, SearchForms, Link, Head},
    data() {
        return {
            isCreateForms: false,
            page: {
                current: this.data.current_page,
                all: this.data.allPages
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
        console.log(this.data);
    },
}
</script>
