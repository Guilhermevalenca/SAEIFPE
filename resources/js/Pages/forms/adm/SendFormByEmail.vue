<template>
    <Head title="Enviar email" />
    <Default>
        <div class="d-flex justify-center">
            <v-card width="900px">
                <v-card-title class="text-center">
                    <div>Monte seu email</div>
                </v-card-title>
                <v-dialog width="900px" v-model="isDialogOpen">
                    <TemplateSendFormByEmail :title="form.title" :text="form.text" :form_id="data.id" />
                </v-dialog>
                <v-form @submit.prevent="submit()" class="d-flex justify-center ma-10">

                    <v-card variant="outlined" width="900px">

                        <div class="d-flex justify-space-between">
                            <v-card-title>
                                <div>Formulário: {{ data.title }}</div>
                            </v-card-title>

                            <v-card-actions>
                                <v-tooltip text="Visualize como está ficando seu email">
                                    <template #activator="{ props }">
                                        <v-btn v-bind="props" icon="mdi-clipboard-text-search-outline" @click="isDialogOpen = true" />
                                    </template>
                                </v-tooltip>
                            </v-card-actions>
                        </div>

                        <v-card-text>

                            <v-text-field label="Titulo" placeholder="Escreva o titulo do email"
                                          v-model="form.title" />
                            <v-textarea label="Escreva o conteúdo do email" rows="6" max-rows="30" v-model="form.text" />

                        </v-card-text>

                        <v-card-actions class="d-flex justify-end">
                            <v-btn type="submit" color="secondary" variant="outlined">Enviar email</v-btn>
                        </v-card-actions>

                    </v-card>

                </v-form>
            </v-card>
        </div>
    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import {Head, useForm} from "@inertiajs/vue3";
import TemplateSendFormByEmail from "@/Pages/mail/forms/TemplateSendFormByEmail.vue";

export default {
    name: "sendFormByEmail",
    components: {TemplateSendFormByEmail, Head, Default},
    props: {
        data: Object
    },
    data() {
        return {
            isDialogOpen: false,
            form: useForm({
                title: '',
                text: ''
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('forms_sendEmail', { id: this.data.id}));
        }
    }
}
</script>

<style scoped>

</style>
