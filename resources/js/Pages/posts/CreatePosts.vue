<template>
    <Head title="Criando post" />
    <Default>
        <v-container class="d-flex justify-center">
            <v-card class="w-75">

                <v-card-title class="d-flex justify-center">
                    <div>Crie suas postagens aqui</div>
                </v-card-title>
                <v-card-actions class="d-flex justify-end">
                    <Link :href="route('home')">
                        <v-btn color="secondary" variant="elevated">Todas as postagens</v-btn>
                    </Link>
                </v-card-actions>
                <v-card-text>
                    <v-form ref="form" @submit.prevent="submit()">
                        <v-container>

                            <v-text-field label="Titulo" placeholder="Titulo da postagem" v-model="form.title" :rules="rules.title" />

                            <v-textarea label="Conteúdo" variant="outlined" placeholder="Escreva o conteúdo da postagem" v-model="form.content" :rules="rules.content" />

                            <v-autocomplete variant="outlined" label="Para quem deseja enviar" persistent-hint hint="Caso não preencha este campo, todos os usuários poderão ver está postagem." :items="courses" item-title="name" item-value="id" v-model="form.send_to" :rules="rules.send_to" multiple chips />

                            <v-card :variant="selectForm ? 'outlined' : 'flat'" class="mt-8">
                                <v-checkbox-btn v-model="selectForm">
                                    <template #label>
                                        <div>Deseja adicionar um formulário?</div>
                                    </template>
                                </v-checkbox-btn>
                                <SelectForm v-if="selectForm" @form="v => {form.form_id = v.id; selectedFormTitle = v.title}" />
                                <v-card-text>
                                    <span v-if="form.form_id && selectForm">Este foi o formulário que você selecionou: <strong>{{ selectedFormTitle }}</strong></span>
                                </v-card-text>
                            </v-card>

                            <v-card-actions class="d-flex justify-end">
                                <v-btn color="secondary" type="submit" variant="elevated">Criar postagem</v-btn>
                            </v-card-actions>

                        </v-container>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-container>
    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import { Head, Link, useForm } from '@inertiajs/vue3';
import SelectForm from "@/Components/posts/createPosts/SelectForm.vue";

export default {
    name: "CreatePosts",
    components: {Default, Head, Link, SelectForm},
    data() {
        return {
            form: useForm({
                title: null,
                content: null,
                send_to: null,
                form_id: null
            }),
            selectedFormTitle: null,
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
            rules: {
                title: [
                    value => {
                        if(value) {
                            return true;
                        }
                        return 'É necessário adicionar um titulo';
                    },
                    () => {
                        if(this.form.errors.title) {
                            return this.form.errors.title;
                        }
                        return true
                    }
                ],
                content: [
                    value => {
                        if(value) {
                            return true;
                        }
                        return 'É necessário adicionar algum tipo de conteúdo'
                    },
                    () => {
                        if(this.form.errors.content) {
                            return this.form.errors.content;
                        }
                        return true
                    }
                ],
                send_to: [
                    () => {
                        if(this.form.errors.send_to) {
                            return this.form.errors.send_to;
                        }
                        return true
                    }
                ]
            },
            selectForm: false
        }
    },
    methods: {
        submit() {
            this.$refs.form.validate()
                .then(response => {
                    if(response.valid) {
                        if(!this.selectForm) {
                            this.form.reset('form_id');
                            this.selectedFormTitle = null;
                        }
                        this.form.post(route('posts_store'));
                    }
                })
        }
    },
    watch: {
        "form.errors": {
            handler() {
                this.$refs.form.validate();
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
