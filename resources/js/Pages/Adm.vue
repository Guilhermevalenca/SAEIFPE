<template>
    <Head title="adm" />
    <Default>
        <v-card>

            <v-card-title>Gerenciamento</v-card-title>
            <v-card-subtitle>Menu de gerenciamento da pagina e de usuários!!!</v-card-subtitle>

            <v-card-text>

                <v-form ref="form" @submit.prevent="submit()" class="w-50">
                    <!-- input apenas pq o maska por misterios não funciona no text-field -->
                    <input type="hidden" v-maska data-maska="###.###.###-##" v-model="form.cpf">
                    <v-text-field v-model="form.cpf" :rules="rules.cpf" label="cpf" placeholder="Digite o cpf da pessoa que torna-la adm" />
                    <v-btn :loading="loading" color="tertiary" type="submit">Adicionar</v-btn>
                </v-form>
            </v-card-text>
        </v-card>
        <v-dialog v-model="showSuccess">
            <v-container class="d-flex justify-center">
                <v-card class="w-50">
                    <v-card-title>Usuário adm adicionando com sucesso</v-card-title>
                    <v-card-actions class="d-flex justify-end mt-5">
                        <v-btn>
                            <Link :href="route('home')">
                                Voltar pro inicio
                            </Link>
                        </v-btn>
                        <v-btn variant="tonal" color="secondary" @click="showSuccess = false">Adicionar novo adm</v-btn>
                    </v-card-actions>
                </v-card>
            </v-container>
        </v-dialog>
    </Default>
</template>

<script>
import Default from "@/Layouts/default/Default.vue";
import {Head, useForm, Link} from '@inertiajs/vue3';
import { vMaska } from 'maska';
export default {
    name: "Adm",
    components: {Default, Head, Link},
    directives: { maska: vMaska },
    data() {
        return {
            form: useForm({
                cpf: ''
            }),
            rules: {
                cpf: [
                    value => {
                        return value ? true : 'É necessário digitar o cpf';
                    },
                    () => {
                        if(this.form.errors.cpf) {
                            return this.form.errors.cpf;
                        } return true
                    }
                ]
            },
            loading: false,
            showSuccess: false
        }
    },
    methods: {
        submit() {
            this.loading = true;
            const modifyCPF = (value) => {
                if(/^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(value)) {
                    return value.replace(/[^0-9]/g, "");
                }
                return value;
            }
            this.form.cpf = modifyCPF(this.form.cpf);

            this.form.post(route('adm_newAdm'));
        }
    },
    watch: {
        'form.errors': {
            handler() {
                this.$refs.form.validate();
                this.loading = false;
            },
            deep: true
        },
        form: {
            handler($new) {
                if($new.wasSuccessful) {
                    $new.reset();
                    this.showSuccess = true;
                    this.loading = false;
                }
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
