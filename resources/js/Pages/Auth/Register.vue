<template>
    <Default>
        <Head title="Register" />

        <v-container class="d-flex justify-center mt-12 pa-12">

            <v-card class="w-50 sm:max-w-md" variant="flat">

                <v-card-title>Registrar</v-card-title>
                <v-form @submit.prevent="submit()">
                    <v-container>

                        <div>

                            <v-text-field id="name" for="name" label="Nome" type="text" class="mt-1 block w-full" v-model="form.name" :rules="rules.name" required
                            />

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div class="mt-4">

                            <v-text-field id="email" for="email" label="Email" type="email" class="mt-1 block w-full" placeholder="Email pessoal" v-model="form.email" :rules="rules.email" required
                            />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="mt-4">

                            <input type="hidden" v-maska data-maska="###.###.###-##" v-model="form.cpf">
                            <v-text-field for="cpf" label="cpf" id="cpf" type="text" v-model="form.cpf" :rules="rules.cpf" />
                            <InputError class="mt-2" :message="form.errors.cpf" />

                        </div>

                        <div class="mt-4">

                            <v-text-field id="password" for="password" label="Senha" class="mt-1 block w-full" v-model="form.password" :rules="rules.password" required
                                          :append-inner-icon="showIcon.password ? 'mdi-eye' : 'mdi-eye-off'" :type="showIcon.password ? 'text' : 'password'" @click:append-inner="showIcon.password = !showIcon.password" />

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="mt-4">

                            <v-text-field id="password_confirmation" for="password_confirmation" label="Confirme sua senha" class="mt-1 block w-full" v-model="form.password_confirmation" :rules="rules.confirmPassword" required
                                          :append-inner-icon="showIcon.confirmPassword ? 'mdi-eye' : 'mdi-eye-off'" :type="showIcon.confirmPassword ? 'text' : 'password'" @click:append-inner="showIcon.confirmPassword = !showIcon.confirmPassword" />

                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <Link
                                    :href="route('login')"
                                    class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Já registrado?
                            </Link>

                            <v-btn color="tertiary" type="submit" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Registrar
                            </v-btn>
                        </div>

                    </v-container>
                </v-form>

            </v-card>

        </v-container>

    </Default>
</template>

<script>
import { Head, Link, useForm } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import Default from '@/Layouts/default/Default.vue';
import { vMaska } from 'maska';
export default {
    name: 'Register',
    components: {Head, Link, GuestLayout, InputError, Default},
    directives: { maska: vMaska },
    data() {
        return {
            form: useForm({
                name: '',
                email: '',
                cpf: '',
                password: '',
                password_confirmation: ''
            }),
            rules: {
                name: [
                    value => {
                        if(value) {
                            return true;
                        }
                        return 'É preciso preencher este campo';
                    }
                ],
                email: [
                    value => {
                        if(/.+@.+\..+/.test(value)) {
                            return true
                        }
                        return 'Email inválido';
                    },
                    value => {
                        if(value) {
                            if(!value.endsWith('@discente.ifpe.edu.br')) {
                                return true;
                            }
                            return 'Email não pode ser o email institucional';
                        }
                        return 'O email é obrigatório';
                    }
                ],
                cpf: [
                    value => {
                        if(value) {
                            return true;
                        }
                        return 'Este campo é obrigatório';
                    },
                    (value) => {
                        let test = value.replace(/[^0-9]/g, '');

                        if (test.length === 11) {
                            let add = 0;

                            for (let i = 0; i < 9; i++) {
                                add += parseInt(test.charAt(i)) * (10 - i);
                            }

                            let rev = 11 - (add % 11);

                            if (rev === 10 || rev === 11) {
                                rev = 0;
                            }

                            if (rev !== parseInt(test.charAt(9))) {
                                return 'CPF inválido';
                            }

                            add = 0;

                            for (let i = 0; i < 10; i++) {
                                add += parseInt(test.charAt(i)) * (11 - i);
                            }

                            rev = 11 - (add % 11);

                            if (rev === 10 || rev === 11) {
                                rev = 0;
                            }

                            if (rev !== parseInt(test.charAt(10))) {
                                return 'CPF inválido';
                            }

                            return true;
                        } else {
                            return 'CPF inválido';
                        }
                    }
                ],
                password: [
                    value => {
                        if(value) {
                            if(/\d/.test(value) && /[a-zA-Z]/.test(value)) {
                                return true;
                            }
                            return 'Senha precisa ter caracteres alfanuméricos (letras e números)';
                        }
                        return 'Senha obrigatório';
                    },
                    value => {
                        if(value) {
                            if(value.length >= 6) {
                                return true;
                            }
                            return 'Senha precisa ter no mínimo 6 caracteres';
                        }
                        return 'Senha obrigatório';
                    }
                ],
                confirmPassword: [
                    value => {
                        if(value) {
                            if(value === this.form.password) {
                                return true;
                            }
                            return 'Senhas diferentes';
                        }
                        return 'É necessário confirmar sua senha';
                    }
                ]
            },
            showIcon: {
                password: false,
                confirmPassword: false
            }
        }
    },
    methods: {
        submit() {
            this.form.cpf = this.form.cpf.replace(/[^0-9]/g, '');
            this.form.post(route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation')
            })
        }
    }
}
</script>
