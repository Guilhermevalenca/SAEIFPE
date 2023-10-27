<template>
    <v-form @submit.prevent="createForm()">

        <v-card>

            <v-card-title class="text-center">
                <div>Construa seu formulário</div>
            </v-card-title>

            <v-spacer :class="[phoneDisplay ? '' : 'pa-6']"> </v-spacer>

            <v-card-text class="w-75">

                <v-text-field label="Nome" persistent-placeholder placeholder="Dê um nome para o formulário" v-model="form.title" />

                <v-card class="mb-10" v-for="(question, index) in form.questions" :key="index">

                    <v-card-text>

                        <v-card variant="outlined">
                            <div class="ma-2">

                                <v-card-title class="mb-2">Pergunta {{ index + 1 }}: </v-card-title>

                                <v-select placeholder="Escolha qual o tipo de pergunta..." v-model="typeQuestions[index]" :items="types" item-title="name" item-value="id" />

                                <v-textarea v-model="form.questions[index].ask" rows="1" max-rows="10" auto-grow persistent-placeholder placeholder="Escreva a pergunta aqui" hint="Exemplo de titulo" />

                            </div>

                            <div class="ma-2" v-if="typeQuestions[index] === 'unique'">
                                <UniqueQuestionsForm :getValues="getvalues" @send_data="(v) => {form.questions[index].responses = v; questions[index].type = typeQuestions[index]}" />
                            </div>

                            <div class="ma-2" v-if="typeQuestions[index] === 'multiple'">
                                <MultipleQuestionsForm :getValues="getvalues" @send_data="(v) => {form.questions[index].responses = v; form.questions[index].type = typeQuestions[index]}" />
                            </div>
                        </v-card>

                    </v-card-text>

                </v-card>

                <v-card-actions class="d-flex justify-end">
                    <v-tooltip text="Remover ultima questão">
                        <template #activator="{ props}">
                            <v-btn v-bind="props" variant="outlined" :disabled="form.questions.length === 1" @click="removeQuestion()">
                                <v-icon icon="mdi-minus" />
                            </v-btn>
                        </template>
                    </v-tooltip>
                    <v-tooltip text="Adicionar nova questão">
                        <template #activator="{ props }">
                            <v-btn v-bind="props" variant="outlined" color="secondary" @click="addQuestion()">
                                <v-icon icon="mdi-plus" />
                            </v-btn>
                        </template>
                    </v-tooltip>
                </v-card-actions>

            </v-card-text>

            <v-card-actions class="d-flex justify-end w-100 h-100">
                <div> <!-- props da div: -->
                    <!-- class="v-layout-item text-end pointer-events-none" style="bottom: 0px; z-index: 1004; transform: translateY(0%); position: fixed; height: 88px; left: 0px; width: calc((100% - 0px) - 0px);" -->
                    <!-- precisando de solução para quando a div tiver sobreposta aos botões da pagina, não afeta-los! -->
                    <v-btn variant="tonal">Cancelar</v-btn>
                    <v-btn type="submit" :loading="creatingForm" color="secondary" variant="elevated">Salvar formulário</v-btn>
                </div>
            </v-card-actions>
        </v-card>

    </v-form>
</template>

<script>
import UniqueQuestionsForm from "./createForms/UniqueQuestionsForm.vue";
import MultipleQuestionsForm from "./createForms/MultipleQuestionsForm.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "formDefault",
    components: {MultipleQuestionsForm, UniqueQuestionsForm},
    data() {
        return {
            phoneDisplay: window.innerWidth <= 800,
            form: useForm({
                title: '',
                questions: [
                    {
                        ask: '',
                        responses: [],
                        type: ''
                    }
                ],
            }),
            typeQuestions: [],
            types: [
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
            getvalues: false,
            creatingForm: false
        }
    },
    methods: {
        addQuestion() {
            const defaultObject = {
                ask: '',
                responses: [],
                type: ''
            }
            this.form.questions.push(defaultObject);
        },
        removeQuestion() {
            this.form.questions.pop();
        },
        createForm() {
            this.creatingForm = true;
            this.getvalues = true;

            this.form.questions.map(question => {
                if(question.type === '') {
                    question.type = 'open-ended';
                }
                return question;
            });

            this.form.post(route('forms_store'));
            this.clearComponent();
        },
        clearComponent() {
            this.form.title = '';
            this.form.questions = [
                {
                    ask: '',
                    responses: [],
                    type: ''
                }
            ];
            this.typeQuestions = [];
            this.getvalues = false;
            this.creatingForm = false;
        }
    }
}

</script>

<style scoped>

</style>
