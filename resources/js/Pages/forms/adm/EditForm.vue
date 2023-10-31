<template>
    <Default>
        <v-form @submit.prevent="submit()">
            <v-card>

                <v-card-title class="text-center">
                    <div>Edite seu formulário</div>
                </v-card-title>

                <v-card-text class="w-75">

                    <v-text-field label="Nome" v-model="form.title" />

                    <v-card v-for="(question, index) in form.questions">

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

                <v-card-actions class="d-flex justify-end">
                    <v-btn type="submit" variant="outlined" color="secondary">Editar formulário</v-btn>
                </v-card-actions>
            </v-card>
        </v-form>
    </Default>
</template>

<script>
import Default from '@/Layouts/default/Default.vue';
import {useForm} from "@inertiajs/vue3";
import UniqueQuestionsEditForm from "@/Components/forms/admUsersForms/EditForm/UniqueQuestionsEditForm.vue";
import MultipleQuestionsEditForm from "@/Components/forms/admUsersForms/EditForm/MultipleQuestionsEditForm.vue";
export default {
    name: "EditForm",
    components: {MultipleQuestionsEditForm, UniqueQuestionsEditForm, Default},
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
            ]
        }
    },
    created() {
        console.log(this.form);
    },
    watch: {
        form: {
            handler($new) {
                console.log($new);
            },
            deep: true
        }
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
    }
}
</script>

<style scoped>

</style>
