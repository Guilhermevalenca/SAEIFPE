<template>
    <Head title="tests" />
    <Default>
        <v-container>
            <v-card>
                <v-card-title class="text-center">
                    <div>test</div>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-form ref="form" @submit.prevent="submit()">
                            <v-text-field label="Nome" :rules="rules.name" v-model="form.name" />
                            <v-text-field label="CPF" :rules="rules.cpf" v-model="form.cpf" />
                            <v-text-field label="Telefone" v-for="(phone, index) in form.phones" :rules="rules.phone" v-model="form.phones[index]" >
                                <template #append>
                                    <v-btn @click="form.phones.pop()" icon="mdi-minus" />
                                    <v-btn @click="form.phones.push(null)" icon="mdi-plus" />
                                </template>
                            </v-text-field>
                            <v-btn type="submit">enviar</v-btn>
                        </v-form>
                    </v-container>
                </v-card-text>
            </v-card>
        </v-container>
    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import {useForm, Head} from "@inertiajs/vue3";

export default {
    name: "Test",
    components: {Default, Head},
    data() {
        return {
            form: useForm({
                name: null,
                cpf: null,
                phones: [null],
            }),
            rules: {
                name: [
                    value => {
                        if(value) {
                            return true;
                        }
                        return 'É necessário preencher este campo';
                    }
                ],
                cpf: [
                    value => {
                        if(value) {
                            return true;
                        }
                        return 'É preciso preencher seu cpf';
                    },
                    () => {
                        if(this.form.errors.cpf) {
                            return this.form.errors.cpf
                        }
                        return true;
                    }
                ],
                phone: [
                    value => {
                        if(value) {
                            return true;
                        }
                        return 'É necessário adicionar seu telefone';
                    }
                ]
            }
        }
    },
    methods: {
        submit() {
            this.$refs.form.validate()
                .then(result => {
                    if(result.valid) {
                        this.form.post(route('test_store'), {
                            onError: error => {
                                console.log(error.hello);
                            },
                        });
                    }
                });
        }
    },
    watch: {
        "form.errors": {
            handler() {
                this.$refs.form.validate();
            },
            deep: true
        },
    },
}
</script>


<style scoped>

</style>
