<template>
    <Head title="Editando formulário" />
    <Default class="d-flex justify-center">
        <v-container>

            <v-card>

                <v-card-title class="text-center">
                    <div>Edite seu formulário</div>
                </v-card-title>

                <v-form @submit.prevent="submit()" class="d-flex justify-center">

                    <v-container class="w-75">

                        <v-text-field label="Nome" v-model="form.title" />

                        <v-card variant="text" v-for="(question, index) in form.questions">

                            <v-card-text>

                                <v-card variant="outlined">

                                    <div class="ma-2">

                                        <v-card-title class="ma-2">
                                            <div>Pergunta {{ index + 1 }}</div>
                                        </v-card-title>

                                        <v-card-text>

                                            <v-select placeholder="Escolha qual o tipo de pergunta..." :items="typeQuestions" item-title="name" item-value="id" v-model="question.type" />

                                            <v-textarea v-model="question.ask" rows="1" max-rows="10" auto-grow persistent-placeholder placeholder="Escreva a pergunta aqui" hint="Exemplo de titulo" />

                                        </v-card-text>

                                    </div>

                                    <v-card-text class="ma-2">

                                        <div v-if="question.type === 'unique'">
                                            <UniqueQuestionsEditForm :options="question.options" @send_data="(value) => question.options = value" />
                                        </div>
                                        <div v-if="question.type === 'multiple'">
                                            <MultipleQuestionsEditForm :options="question.options" @send_data="(value) => question.options = value" />
                                        </div>

                                    </v-card-text>

                                </v-card>

                            </v-card-text>

                        </v-card>

                        <v-card-actions class="d-flex justify-end">
                            <v-tooltip text="Remover ultima questão">
                                <template #activator="{ props}">
                                    <v-btn v-bind="props" variant="outlined" :disabled="form.questions.length === 1" @click="removeQuestion()">
                                        <v-icon icon="mdi-minus" />
                                        Remover a ultima questão
                                    </v-btn>
                                </template>
                            </v-tooltip>
                            <v-tooltip text="Adicionar nova questão">
                                <template #activator="{ props }">
                                    <v-btn v-bind="props" variant="elevated" color="secondary" @click="addQuestion()">
                                        <v-icon icon="mdi-plus" />
                                        Adicionar questão
                                    </v-btn>
                                </template>
                            </v-tooltip>
                        </v-card-actions>

                        <v-card-actions class="d-flex justify-end mt-12">
                            <v-btn color="error" variant="tonal" @click="cancelEditForm = true">
                                cancelar
                            </v-btn>
                            <v-btn type="submit" variant="elevated" color="secondary">Salvar alterações</v-btn>
                        </v-card-actions>

                    </v-container>
                </v-form>
                <v-dialog width="600px" v-model="cancelEditForm">
                    <v-card>
                        <v-card-title>Desejar cancelar?</v-card-title>
                        <v-card-text>
                            <div>Ao cancelar você perderá qualquer edição que tenha sido realizada</div>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn @click="cancelEditForm = false">Fechar</v-btn>
                            <v-btn color="error" variant="tonal" @click="myFormsCreated()">OK!!!</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-card>

        </v-container>
    </Default>
</template>

<script>
import Default from '@/Layouts/default/Default.vue';
import {Head, useForm} from "@inertiajs/vue3";
import UniqueQuestionsEditForm from "@/Components/forms/admUsersForms/EditForm/UniqueQuestionsEditForm.vue";
import MultipleQuestionsEditForm from "@/Components/forms/admUsersForms/EditForm/MultipleQuestionsEditForm.vue";
export default {
    name: "EditForm",
    computed: {},
    components: {Head, MultipleQuestionsEditForm, UniqueQuestionsEditForm, Default},
    props: {
        data: Object
    },
    data() {
        return {
            form: useForm({
                forms_id: this.data.form.data.id,
                title: this.data.form.data.title,
                questions: this.data.questions.data
            }),
            typeQuestions: [
                {
                    id: 'open-ended',
                    name: 'Aberta'
                },
                {
                    id: 'unique',
                    name: 'Escolha única'
                },
                {
                    id: 'multiple',
                    name: 'Múltipla escolhas'
                }
            ],
            cancelEditForm: false
        }
    },
    created() {

    },
    watch: {

    },
    methods: {
        submit() {
            this.form.put(route('forms_update'));
        },
        addQuestion() {
            const defaultObject = {
                ask: '',
                options: [
                    {
                        descriptions: ''
                    }
                ],
                type: null
            }
            this.form.questions.push(defaultObject);
        },
        removeQuestion() {
            this.form.questions.pop();
        },
        myFormsCreated() {
            window.history.back();
        }
    }
}
</script>

<style scoped>

</style>
