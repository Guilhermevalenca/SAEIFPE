<template>
    <Head title="Enviar email" />
    <Default>
        <div class="d-flex justify-center">
            <v-card :width="$phoneDisplay ? '' : '900px'">
                <v-card-title class="text-center">
                    <div>Monte seu email</div>
                </v-card-title>
                <v-dialog :width="$phoneDisplay ? '' : '900px'" v-model="isDialogOpen">
                    <TemplateSendFormByEmail :title="form.title" :text="form.text" :form_id="data.id" />
                </v-dialog>
                <v-form ref="form" @submit.prevent="submit()" class="d-flex justify-center ma-10">

                    <v-card variant="outlined" :width="$phoneDisplay ? '' : '900px'">

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

                            <v-text-field label="Titulo" placeholder="Escreva o titulo do email" v-model="form.title" :rules="defaultRules" />

                            <v-textarea label="Escreva o conteúdo do email" rows="6" max-rows="30" v-model="form.text" :rules="defaultRules" />

                            <v-container>
                                <v-checkbox v-model="form.allGraduates" label="Deseja enviar para todos os egressos" />

                                <v-checkbox v-model="form.student" label="Enviar esté email para os atuais estudantes" />
                            </v-container>

                            <v-tooltip text="Escolha qual ou quais pessoas de determinados cursos vão receber este email">
                                <template #activator="{ props }">

                                    <v-autocomplete :disabled="form.allGraduates" v-bind="props" label="Curso(s) destinatários" :items="courses" item-value="id" item-title="name" chips multiple v-model="form.courses" :rules="defaultRules" />

                                </template>
                            </v-tooltip>


                        </v-card-text>

                        <v-card-actions class="d-flex justify-end">
                            <v-btn @click="showCancel = true" color="error" variant="tonal">cancelar</v-btn>
                            <v-btn :loading="loadingSendEmail" type="submit" color="secondary" variant="elevated">Enviar email</v-btn>
                        </v-card-actions>

                    </v-card>

                </v-form>
                <v-dialog v-model="showCancel" :width="$phoneDisplay ? '' : '600px'">
                    <v-container>
                        <v-card>
                            <v-card-title>Deseja cancelar:</v-card-title>
                            <v-card-text>
                                <div>Ao cancelar você perderá o que foi preenchido</div>
                            </v-card-text>
                            <v-card-actions class="ma-2">
                                <v-btn @click="showCancel = false">Fechar</v-btn>
                                <v-btn color="error" variant="elevated" @click="historyBack()">OK</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-container>
                </v-dialog>
                <v-dialog v-model="sendEmailSuccess" persistent>
                    <v-container class="d-flex justify-center">
                        <v-card :width="$phoneDisplay ? '' : '600px'">
                            <v-card-title>Email enviado</v-card-title>
                            <v-card-subtitle>Email enviado com sucesso, para todos os destinatarios</v-card-subtitle>
                            <v-card-actions class="d-flex justify-space-between ma-2">
                                <v-btn variant="outlined" @click="this.sendEmailSuccess = false;sendOtherEmail()">Enviar novo email</v-btn>
                                <v-btn variant="elevated" color="secondary" @click="historyBack()">OK</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-container>
                </v-dialog>
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
            sendEmailSuccess: false,
            loadingSendEmail: false,
            showCancel: false,
            form: useForm({
                title: '',
                text: '',
                courses: null,
                allGraduates: false,
                student: false
            }),
            courses: [
                {
                    id: 'ADM',
                    name: 'ADM - Bacharelado em Administração'
                },
                {
                    id: 'IPI',
                    name: 'IPI - Técnico em Informatica para Internet'
                },
                {
                    id: 'LOG',
                    name: 'LOG - Técnico em Logística'
                },
                {
                    id: 'TGQ',
                    name: 'TGQ - Tecnologia em Gestão de Qualidade'
                },
                {
                    id: 'TSI',
                    name: 'TSI - Tecnologia de Sistema para Internet'
                },
            ],
            defaultRules: [
                value => {
                    if(value) {
                        return true;
                    }
                    return 'É necessário preencher este campo!';
                }
            ],
        }
    },
    methods: {
        submit() {
            // console.table({
            //     title: this.form.title,
            //     text: this.form.text,
            //     allGraduates: this.form.allGraduates,
            //     student: this.form.student,
            //     courses: this.form.courses
            // });
            this.loadingSendEmail = true;
            this.$refs.form.validate()
                .then(response => {
                    if(response.valid) {
                        this.form.post(route('forms_sendEmail', { id: this.data.id}));
                    } else {
                        this.loadingSendEmail = false;
                    }
                })
                .catch(() => this.loadingSendEmail = false);
        },
        historyBack() {
            window.history.back();
        },
        sendOtherEmail() {
            this.form.title = null;
            this.form.text = null;
            this.form.courses = null;
            this.form.allGraduates = false;
            this.form.student = false;
        }
    },
    watch: {
        form: {
            handler($new) {
                if($new.wasSuccessful) {
                    this.loadingSendEmail = false;
                    this.sendEmailSuccess = true;
                }
            },
            deep: true
        },
        "form.errors": {
            handler() {
                this.loadingSendEmail = false;
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
