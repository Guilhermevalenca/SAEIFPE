<template>
    <Head title="Criando post" />
    <Default>
        <v-card-title class="d-flex justify-center">
            <div>Crie suas postagens aqui</div>
        </v-card-title>

        <v-main class="pb-16 ma-0 pa-0">
            <v-container class="d-flex justify-center">
                <v-card :class="$sreenMediumDisplay ? 'w-75' : 'w-50'" variant="flat" color="transparent">

                    <v-card-actions class="d-flex justify-end">
                        <Link :href="route('home')" class="mr-4">
                            <v-btn color="secondary" variant="elevated">Todas as postagens</v-btn>
                        </Link>
                    </v-card-actions>
                    <v-card-text>
                        <v-form ref="form" @submit.prevent="submit()">
                            <v-card class="mt-6">
                                <v-container>

                                    <v-card-title class="text-center mt-2 mb-8">Dados da postagem</v-card-title>
                                    <v-text-field label="Titulo" placeholder="Titulo da postagem" v-model="form.title" :rules="rules.title" />

                                    <AddPostContent @form_content="v => form.content = v" @form_content_img="v => form.img = v" />

                                    <v-autocomplete variant="outlined" label="Para quem deseja enviar" persistent-hint hint="Caso não preencha este campo, todos os usuários poderão ver está postagem." :items="courses" item-title="name" item-value="id" v-model="form.send_to" :rules="rules.send_to" multiple chips />

                                    <v-card :variant="selectForm ? 'outlined' : 'text'" class="mt-8">
                                        <v-checkbox-btn v-model="selectForm">
                                            <template #label>
                                                <div>Deseja adicionar um formulário?</div>
                                            </template>
                                        </v-checkbox-btn>
                                        <SelectForm v-if="selectForm" @form="v => {form.form_id = v.id; selectedFormTitle = v.title}" />
                                        <v-card-text>
                                            <span v-if="form.form_id && selectForm">Este foi o formulário que você selecionou:
                                                <v-tooltip>
                                                    <template #default>
                                                        <div>Deseja visualizar este formulário ?</div>
                                                        <div>Obs.: isso irá abrir uma nova aba no seu navegador!</div>
                                                    </template>
                                                    <template #activator="{ props }">
                                                        <v-btn v-bind="props" @click="viewForm(form.form_id)" variant="flat" color="secondary">{{ selectedFormTitle }}</v-btn>
                                                    </template>
                                                </v-tooltip>
                                            </span>
                                        </v-card-text>
                                    </v-card>

                                    <v-card-actions class="d-flex justify-end">
                                        <v-btn @click="historyBack()">Cancelar</v-btn>
                                        <v-btn color="tertiary" type="submit" variant="elevated">Criar postagem</v-btn>
                                    </v-card-actions>

                                </v-container>
                            </v-card>
                        </v-form>
                    </v-card-text>
                </v-card>
            </v-container>
        </v-main>

    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import { Head, Link, useForm } from '@inertiajs/vue3';
import SelectForm from "@/Components/posts/createPosts/SelectForm.vue";
import AddPostContent from "@/Components/posts/createPosts/AddPostContent.vue";

export default {
    name: "CreatePosts",
    components: {AddPostContent, Default, Head, Link, SelectForm},
    data() {
        return {
            form: useForm({
                title: null,
                content: null,
                img: null,
                links: null,
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
        },
        historyBack() {
            window.history.back();
        },
        viewForm(id) {
            window.open(route('forms_show', {id: id}), "_blank");
        }
    },
    watch: {
        "form.errors": {
            handler($new) {
                console.log($new);
                this.$refs.form.validate();
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
