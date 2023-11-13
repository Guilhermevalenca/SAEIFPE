<template>
    <v-container>
        <div>
            <v-btn @click="displayForms = true">Selecione um formulário</v-btn>
        </div>
        <v-dialog v-model="displayForms">
            <v-container>
                <v-card>
                    <v-card-title v-if="result">{{ result }}</v-card-title>
                    <v-card-title>
                        <div>Selecione o formulário</div>
                    </v-card-title>
                    <v-card-text>
                        <v-form @submit.prevent="submit()">
                            <v-container class="d-flex">
                                <v-text-field label="Pesquise pelo formulário" placeholder="Digite o titulo do formulário que deseja adicionar na postagem" v-model="form.title" :rules="rules">
                                    <template #append>
                                        <v-btn color="secondary" variant="elevated" type="submit" icon="mdi-text-search" />
                                    </template>
                                </v-text-field>
                            </v-container>
                        </v-form>
                        <v-card variant="text" :loading="searching">
                            <v-card-title>
                                <div>Formulário selecionado: {{  }}</div>
                            </v-card-title>
                            <v-row v-for="(form, index) in data" :key="index">
                                <v-btn class="tonal">{{ form.title }}</v-btn>
                            </v-row>
                        </v-card>
                    </v-card-text>
                </v-card>
            </v-container>
        </v-dialog>
    </v-container>
</template>

<script>

import {useForm} from "@inertiajs/vue3";

export default {
    name: "SelectCourse",
    props: {
        result: Object
    },
    data() {
        return {
            displayForms: false,
            form: useForm({
                title: null
            }),
            searching: false,
            data: null,
            rules: [
                value => {
                    return value ? true : 'É necessário digitar um valor'
                },
                () => {
                    if(this.form.errors.title) {
                        return this.form.errors.title;
                    }
                    return true;
                }
            ]
        }
    },
    methods: {
        submit() {
            this.form.post(route('searchForFormsInCreatePosts'), {
                onSuccess: response => console.log(response),
            });
            // axios.post(route('searchForFormsInCreatePosts'), {
            //     title: $new
            // })
            //     .then(response => {
            //         console.log(response.data);
            //         // this.data = response.data;
            //     })
            //     .catch(error => console.log(error));

        }
    },
    watch: {
        // form: {
        //     handler($new) {
        //         console.log($new);
        //     },
        //     deep: true
        // },
    }
}
</script>

<style scoped>

</style>
