<template>
    <Head title="Responder formulário" />
    <Default>
        <v-container>
            <v-card class="w-75">
                <div class="d-flex justify-space-between">
                    <v-card-title>{{ form.title }}</v-card-title>
                    <v-btn @click="returnPage()" color="primary">Voltar</v-btn>
                </div>
                <v-card-text>
                    <v-card v-for="(question, index) in questions" :key="index">

                        <v-card-text>
                            <v-card variant="outlined">

                                <v-card-title class="mb-2" >{{ index + 1 }} - {{ question.ask }}</v-card-title>

                                <div class="ma-2" v-if="question.type === 'open-ended'">
                                    <v-text-field v-model="responses[index].response_text" placeholder="resposta..." />
                                </div>

                                <div class="ma-2" v-if="question.type === 'unique'">
                                    <UniqueQuestionsResponse  :options="question.options" @send_response="(value) => responses[index].response_choose[0] = value" />
                                </div>

                                <div class="ma-2" v-if="question.type === 'multiple'">
                                    <MultipleQuestionsResponse  :options="question.options" @send_response="(value) => responses[index].response_choose = value" />
                                </div>

                            </v-card>
                        </v-card-text>

                    </v-card>
                </v-card-text>

                <v-card-actions class="d-flex justify-end">
                    <v-btn @click="sendResponses()" variant="tonal" color="secondary">Responder</v-btn>
                </v-card-actions>

            </v-card>
        </v-container>
        <v-dialog :width="$phoneDisplay ? '' : '900px'" v-model="dialogResponseSuccess">

            <v-card class="w-75">
                <v-card-title class="d-flex justify-center">
                    <div>Formulários respondido com sucesso</div>
                </v-card-title>

                <v-card-actions class="d-flex justify-center">
                    <v-btn :to="{name: 'formView'}" color="secondary">OK!</v-btn>
                </v-card-actions>

            </v-card>

        </v-dialog>
    </Default>
</template>

<script>
import axios from "axios";
import UniqueQuestionsResponse from "@/Components/forms/otherUsersForms/responseForms/UniqueQuestionsResponse.vue";
import MultipleQuestionsResponse from "@/Components/forms/otherUsersForms/responseForms/MultipleQuestionsResponse.vue";
import {useForm, Head} from "@inertiajs/vue3";
import Default from "@/Layouts/default/Default.vue";

export default {
    name: "ResponseForms",
    components: {Default, MultipleQuestionsResponse, UniqueQuestionsResponse, Head},
    props: {
        data: Object
    },
    data() {
        return {
            form: '',
            questions: [],
            responses: [],
            dialogResponseSuccess: false
        }
    },
    methods: {
        sendResponses() {
            const data = this.responses.map(response => {
                return {
                    forms_id: this.form.id,
                    questions_id: response.question_id,
                    selected_responses: response.response_choose,
                    open_ended_responses: response.response_text
                }
            });
            const submit = useForm(data);
            submit.post(route('forms_store_response'));
        },
        returnPage() {
            window.history.back();
        }
    },
    created() {
        console.log(this.data);
        this.form = this.data.form.data;
        this.questions = this.data.questions;
        this.questions.forEach((question, index) => {
            this.responses[index] = {
                question_id: question.id,
                response_text: '',
                response_choose: []
            }
        });
    }
}
</script>

<style scoped>

</style>
