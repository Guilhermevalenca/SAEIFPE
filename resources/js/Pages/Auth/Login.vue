<template>
    <Default>
        <Head title="Login" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <GuestLayout>

            <v-card-title>Acesse sua conta</v-card-title>

            <v-form @submit.prevent="submit()">
                <div>

                    <v-text-field for="email" label="Email" id="email" type="email" v-model="form.email" :rules="rules.email" />
                    <InputError class="mt-2" :message="form.errors.email" />

                </div>

                <div class="mt-4">
                    <v-text-field for="password" label="Password" id="password" v-model="form.password" :append-inner-icon="showIcon.password ? 'mdi-eye' : 'mdi-eye-off'" :type="showIcon.password ? 'text' : 'password'" @click:append-inner="showIcon.password = !showIcon.password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <v-checkbox name="remember" label="Remember me" v-model:checked="form.remember" />
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Esqueceu sua senha?
                    </Link>

                    <v-btn color="tertiary" type="submit" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Conectar
                    </v-btn>
                </div>
            </v-form>

        </GuestLayout>
    </Default>
</template>

<script>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Default from "@/Layouts/default/Default.vue";

export default {
    components: {Head, Link, Default, InputError, GuestLayout},
    props: {
        canResetPassword: {
            type: Boolean,
        },
        status: {
            type: String,
        },
    },
    data() {
        return {
            form: useForm({
                email: '',
                password: '',
                remember: false,
            }),
            rules: {
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
                ]
            },
            showIcon: {
              password: false
            }
        }
    },
    methods: {
        submit() {
            this.form.post(route('login'), {
                onFinish: () => this.form.reset('password'),
            });
        }
    }
}
</script>
