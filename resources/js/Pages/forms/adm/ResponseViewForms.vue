<template>
    <Head title="Responder formulário" />
    <Default>
        <v-container>

            <v-card>
                <v-card-title class="d-flex justify-center">
                    <div>{{ form.title }}</div>
                </v-card-title>

                <v-card-actions class="d-flex justify-end">
                    <v-btn @click="myFormsCreated()" variant="elevated" color="secondary">Meus Formulários</v-btn>
                </v-card-actions>

                <v-card-text>

                    <v-select class="w-50" label="Tamanho do grafico" :items="sizeGraph.options" item-title="name" item-value="class" v-model="sizeGraph.value" />

                    <v-card :class="[sizeGraph.value ,'ma-5']" v-for="(question, index) in questions" :key="index">

                        <div v-if="question[0].type !== 'open-ended'">

                            <v-card variant="outlined">

                                <v-card-title>
                                    <div class="text-wrap">{{ question[0].ask }}</div>
                                </v-card-title>

                                <v-card-text>

                                    <v-select label="Escolha o tipo de grafico" :items="graphTypes" item-title="name" item-value="id" v-model="currentGraphType[index]" />

                                    <ResponseAssembleGraphs :question="question" :index="index" :type="currentGraphType[index]" :size="sizeGraph.value" />

                                </v-card-text>

                            </v-card>

                        </div>
                        <div v-else>

                            <v-card variant="outlined">

                                <v-card-title>
                                    <div class="text-wrap">{{ question[0].ask }}</div>
                                </v-card-title>

                                <v-card-text>

                                    <ResponseOpenEnded :questions="question" />

                                </v-card-text>

                            </v-card>

                        </div>

                    </v-card>

                </v-card-text>
            </v-card>

        </v-container>
    </Default>
</template>

<script>
import ResponseAssembleGraphs from "@/Components/forms/admUsersForms/responseViewForms/ResponseAssembleGraphs.vue";
import ResponseOpenEnded from "@/Components/forms/admUsersForms/responseViewForms/ResponseOpenEnded.vue";
import {Head} from "@inertiajs/vue3";
import Default from "@/Layouts/default/Default.vue";

export default {
    name: "ResponseViewForms",
    components: {Default, Head, ResponseOpenEnded, ResponseAssembleGraphs},
    props: {
        data: Object
    },
    data() {
        return {
            form: '',
            questions: [],
            currentGraphType: [],
            graphTypes: [
                {
                    id: 'bar',
                    name: 'barra'
                },
                {
                    id: 'bubble',
                    name: 'bolha'
                },
                {
                    id: 'doughnut',
                    name: 'rosquinha'
                },
                {
                    id: 'line',
                    name: 'linha'
                },
                {
                    id: 'polarArea',
                    name: 'Área polar/Pizza'
                },
                {
                    id: 'radar',
                    name: 'radar'
                },
                {
                    id: 'scatter',
                    name: 'espalhar/dispersão'
                }
            ],
            sizeGraph: {
                value: 'w-25',
                options: [
                    {
                        class: 'w-25',
                        name: 'Pequeno'
                    },
                    {
                        class: 'w-50',
                        name: 'Médio'
                    },
                    {
                        class: 'w-75',
                        name: 'Grande'
                    },
                    {
                        class: 'w-100',
                        name: 'Muito grande'
                    }
                ]
            }
        }
    },
    methods: {
        myFormsCreated() {
            window.history.back();
        }
    },
    created() {
        this.form = this.data.form.data;
        this.questions = this.data.questions.map((question, index) => {
            this.currentGraphType[index] = 'doughnut';
            return question.data;
        });
    }
}
</script>

<style scoped>

</style>
