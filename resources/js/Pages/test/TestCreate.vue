<template>
    <Default>

        <v-card width="600px" variant="outlined">

            <v-form @submit.prevent="submit()">

                <v-text-field label="Nome" v-model="form.name" placeholder="Escreva seu nome" />
                <v-text-field label="Sobrenome" v-model="form.surname" placeholder="Escreva seu sobrenome" />

                <v-btn type="submit" color="secondary">criar</v-btn>

            </v-form>

        </v-card>

    </Default>
</template>

<script>
import Default from '@/Layouts/default/Default.vue';
import {useForm} from "@inertiajs/vue3";
export default {
    name: "TestCreate",
    components: {Default},
    data() {
        return {
            form: useForm({
                name: '',
                surname: ''
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('test_store'));
        }
    }
}
</script>

<style scoped>

</style>
