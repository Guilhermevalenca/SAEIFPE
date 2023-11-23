<template>
    <v-card color="transparent" variant="flat">

        <v-card class="mb-10" v-show="noForms">
            <v-card-title>Nenhum formulário encontrado!!!</v-card-title>
            <v-card-text>Pelo visto você ainda não criou nenhum formulário. para criar seu primeiro formulário, clique no botão na parte superior direita "CRIAR FORMULÁRIO"</v-card-text>
        </v-card>
        <!-- class="d-flex justify-center flex-row" class="d-flex flex-column"  -->
        <div>
            <v-card :class="['ma-2']" v-for="(form, index) in forms" :key="index">
                <CreatedFormTemplate :form="form" />
            </v-card>
        </div>

    </v-card>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import CreatedFormTemplate from "@/Components/forms/admUsersForms/MyFormsCreated/CreatedFormTemplate.vue";
export default {
    name: "MyFormsCreated",
    components: {CreatedFormTemplate, Link},
    props: {
        data: Object
    },
    data() {
        return {
            forms: this.data.forms.data,
            noForms: false,
        }
    },
    methods: {

    },
    created() {

    },
    watch: {
        data: {
            handler($new) {
                this.forms = $new.forms.data;
            },
            deep: true
        },
    }
}
</script>


<style scoped>

</style>
