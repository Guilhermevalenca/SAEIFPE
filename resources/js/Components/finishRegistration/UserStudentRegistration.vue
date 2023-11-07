<template>
    <v-card class="d-flex justify-center">
        <v-form class="w-50 ma-5" @submit.prevent="submit()">

            <v-text-field v-model="form.email_institution" label="Email institucional" placeholder="example@discente.ifpe.edu.br" />

            <v-autocomplete label="Seu curso" :items="courses" item-title="name" item-value="id" v-model="form.course" />

            <v-text-field v-model="form.enrollment" label="Matricula" placeholder="20232INFIG0001" />

            <v-btn type="submit">Cadastrar novos dados</v-btn>

        </v-form>
    </v-card>
</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "UserStudentRegistration",
    data() {
        return {
            form: useForm({
                email_institution: '',
                course: '',
                enrollment: ''
            }),
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
            ]
        }
    },
    methods: {
        submit() {
            this.form.post(route('finishRegistration_storeStudent'));
        }
    }
}
</script>

<style scoped>

</style>
