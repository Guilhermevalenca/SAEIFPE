<template>
    <v-card class="d-flex justify-center">
        <v-form class="w-100 w-sm-75 w-md-50 w-lg-40 w-xl-30 ma-5" @submit.prevent="submit()">

            <v-text-field cols="12" md="6" v-model="form.email_institution" label="Email institucional" placeholder="example@discente.ifpe.edu.br" />

            <v-autocomplete cols="12" md="6" label="Seu curso" :items="courses" item-title="name" item-value="id" v-model="form.course" />

            <v-text-field cols="12" md="6" v-model="form.enrollment" label="Matricula" placeholder="20232INFIG0001" />

            <v-btn class="mt-3" color="tertiary" variant="flat" type="submit">Cadastrar novos dados</v-btn>

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
