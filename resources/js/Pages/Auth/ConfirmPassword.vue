<template>
    <Default>
        <GuestLayout>
            <Head title="Confirm Password" />

            <div class="mb-4 text-sm text-gray-600">
                Esta é uma área segura do aplicativo. Por favor, confirme sua senha antes de continuar.
            </div>

            <v-form @submit.prevent="submit()">
                <div>
                    <v-text-field id="password" for="password" label="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="flex justify-end mt-4">
                    <v-btn color="secondary" type="submit" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Confirmar
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
    name: 'ConfirmPassword',
    components: {Default, GuestLayout, InputError,  Head},
    data() {
        return {
            form: useForm({
                password: ''
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('password.confirm'), {
                onFinish: () => this.form.reset()
            })
        }
    }
}
</script>
