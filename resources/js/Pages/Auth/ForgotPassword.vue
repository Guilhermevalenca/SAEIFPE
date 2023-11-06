<template>
    <Default>

        <GuestLayout>
            <Head title="Forgot Password" />

            <div class="mb-4 text-sm">
                <v-card-title>Esqueceu sua senha?</v-card-title>
                 Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos por e-mail um link de redefinição de senha que permitirá que você escolha uma nova.
            </div>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <v-form @submit.prevent="submit()">
                <div>
                    <v-text-field id="email" for="email" type="email" label="Email" class="mt-1 block w-full" v-model="form.email" required

                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <v-btn color="secondary" type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Email Password Reset Link
                    </v-btn>
                </div>
            </v-form>
        </GuestLayout>

    </Default>
</template>

<script>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Default from "@/Layouts/default/Default.vue";

export default {
    name: 'ForgotPassword',
    components: {Default, Head, GuestLayout, InputError},
    props: {
        status: {
            type: String,
        },
    },
    data() {
        return {
            form: useForm({
                email: '',
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('password.email'));
        }
    }
}
</script>
