<template>
    <Head title="Responder formulário" />
    <Default>
        <v-card>
            <v-card-title class="d-flex justify-center">
                <div>{{ form.title }}</div>
            </v-card-title>
            <v-card-text>

                <v-select class="w-50" label="Escolha o tipo de grafico" :items="graphTypes" item-title="name" item-value="id" v-model="currentGraphType" />

                <v-card class="w-25 ma-5" v-for="(question, index) in questions" :key="index">

                    <div v-if="question[0].type !== 'open-ended'">

                        <v-card variant="outlined">

                            <v-card-title>
                                <div>{{ question[0].ask }}</div>
                            </v-card-title>

                            <v-card-text>

                                <ResponseAssembleGraphs :question="question" :index="index" :type="currentGraphType" />

                            </v-card-text>

                        </v-card>

                    </div>
                    <div v-else>

                        <v-card variant="outlined">

                            <v-card-title>
                                <div>{{ question[0].ask }}</div>
                            </v-card-title>

                            <v-card-text>

                                <ResponseOpenEnded :questions="question" />

                            </v-card-text>

                        </v-card>

                    </div>

                </v-card>

            </v-card-text>
        </v-card>
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
            currentGraphType: 'doughnut',
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
            ]
        }
    },
    methods: {

    },
    created() {
        this.form = this.data.form.data;
        this.questions = this.data.questions.map(question => {
            return question.data;
        });
        console.log(this.questions);
    }
}
</script>

<style scoped>

</style>
