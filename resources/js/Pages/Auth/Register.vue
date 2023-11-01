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
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation')
            })
        }
    }
}
</script>

<template>
    <Default>

        <GuestLayout>

            <Head title="Register" />

            <v-card-title>Registrar</v-card-title>
            <v-form @submit.prevent="submit()">
                <div>

                    <v-text-field id="name" for="name" label="Nome" type="text" class="mt-1 block w-full" v-model="form.name" required
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">

                    <v-text-field id="email" for="email" label="Email" type="email" class="mt-1 block w-full" v-model="form.email" required
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">

                  <input type="hidden" v-maska data-maska="###.###.###-##" v-model="form.cpf">
                    <v-text-field for="cpf" label="cpf" id="cpf" type="text" v-model="form.cpf" />
                    <InputError class="mt-2" :message="form.errors.cpf" />

                </div>

                <div class="mt-4">

                    <v-text-field id="password" for="password" label="Senha" type="password" class="mt-1 block w-full" v-model="form.password" required
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">

                    <v-text-field id="password_confirmation" for="password_confirmation" label="Confirme sua senha" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required
                    />

                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link
                        :href="route('login')"
                        class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Já registrado?
                    </Link>

                    <v-btn color="secondary" type="submit" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Registrar
                    </v-btn>
                </div>
            </v-form>
        </GuestLayout>

    </Default>
</template>
