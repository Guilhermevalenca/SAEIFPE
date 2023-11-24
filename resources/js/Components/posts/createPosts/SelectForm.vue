<template>
    <v-container>
        <div>
            <v-btn @click="displayForms = true">Selecione um formulário</v-btn>
        </div>
        <v-dialog v-model="displayForms" class="w-50">
            <v-container>
                <v-card>
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
                        <v-card variant="text" class="mb-2" :loading="searching">
                            <v-row>
                                <v-card-title>
                                    <div>Formulário selecionado: {{ selectedForm ? selectedForm.title : '' }}</div>
                                </v-card-title>
                            </v-row>
                            <v-row>
                                <v-col cols="12" v-if="data">
                                    <v-virtual-scroll :items="data" :height="300">
                                        <template #default="{ item, index }">
                                            <v-btn @click="selectedForm = item" :color="selectedForm && selectedForm.id === item.id ? 'secondary' : ''" variant="flat">
                                                {{ index }} - {{ item.title }}</v-btn>
                                        </template>
                                    </v-virtual-scroll>
                                </v-col>
                            </v-row>
                        </v-card>
                    </v-card-text>
                    <v-card-actions class="d-flex justify-end">
                        <v-tooltip text="Este botão não salvará seu formulário selecionado">
                            <template #activator="{ props }">
                                <v-btn v-bind="props" @click="displayForms = false">cancelar</v-btn>
                            </template>
                        </v-tooltip>
                        <v-tooltip text="Clique para salvar formulário selecionado">
                            <template #activator="{ props }">
                                <v-btn v-bind="props" variant="elevated" color="secondary" @click="confirmed()">OK</v-btn>
                            </template>
                        </v-tooltip>
                    </v-card-actions>
                </v-card>
            </v-container>
        </v-dialog>
    </v-container>
</template>

<script>

import {useForm} from "@inertiajs/vue3";

export default {
    name: "SelectCourse",
    data() {
        return {
            displayForms: false,
            form: useForm({
                title: null
            }),
            searching: false,
            data: null,
            selectedForm: null,
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
            ],
        }
    },
    methods: {
        submit() {
            axios.post(route('searchForFormsInCreatePosts'), {
                title: this.form.title
            })
                .then(response => {
                    this.data = response.data;
                })
                .catch(error => console.log(error));
        },
        confirmed() {
            this.$emit('form',this.selectedForm);
            this.displayForms = false;
        }
    },
    watch: {

    }
}
</script>

<style scoped>

</style>
