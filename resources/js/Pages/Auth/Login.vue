<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Default from "@/Layouts/default/Default.vue";

</script>
<script>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Default from "@/Layouts/default/Default.vue";

export default {
    components: {Head, Link},
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
<template>
    <Default>
        <v-card>
            <Head title="Log in" />

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <v-form @submit.prevent="submit()">
                <div>

                    <v-text-field for="email" label="Email" id="email" type="email" v-model="form.email" />
                    <InputError class="mt-2" :message="form.errors.email" />

                </div>

                <div class="mt-4">
                    <v-text-field for="password" label="Password" id="password" type="password" v-model="form.password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Forgot your password?
                    </Link>

                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Log in
                    </PrimaryButton>
                </div>
            </v-form>
        </v-card>
    </Default>
</template>
