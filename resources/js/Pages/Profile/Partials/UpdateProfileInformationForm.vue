<template>
    <section>
        <header>
            <h2 class="text-lg font-medium">Informação do Perfil</h2>

            <p class="mt-1 text-sm">
                Atualize as informações de perfil e endereço de e-mail da sua conta.
            </p>
        </header>

        <v-form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
            <div>
                <v-text-field id="name" for="name" label="Nome" type="text" class="mt-1 block w-full" v-model="form.name" required
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <v-text-field id="email" for="email" label="Email" type="email" class="mt-1 block w-full" v-model="form.email" required
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div v-if="mustVerifyEmail && $page.props.auth.user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    Seu endereço de e-mail não foi verificado.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Clique aqui para reenviar o e-mail de verificação.
                    </Link>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    Um novo link de verificação foi enviado para seu endereço de e-mail.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <v-btn type="submit" color="secondary" :disabled="form.processing">Salvar</v-btn>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm ">Salvou.</p>
                </Transition>
            </div>
        </v-form>
    </section>
</template>
<script>
import InputError from '@/Components/InputError.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

export default {
    name: "UpdateProfileInformationForm",
    components: {Link, InputError},
    props: {
        mustVerifyEmail: {
            type: Boolean,
        },
        status: {
            type: String,
        },
    },
    data() {
        const user = usePage().props.auth.user;
        return {
            form: useForm({
                name: user.name,
                email: user.email,
            })
        }
    }
}
</script>
