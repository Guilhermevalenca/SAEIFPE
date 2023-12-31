<template>
    <section>
        <header>
            <h2 class="text-lg font-medium">Atualizar senha</h2>

            <p class="mt-1 text-sm">
                Certifique-se de que sua conta esteja usando uma senha longa e aleatória para permanecer segura.
            </p>
        </header>

        <v-form @submit.prevent="updatePassword" class="mt-6 space-y-6">
            <div>
                <v-text-field id="current_password" for="current_password" label="Senha atual" ref="currentPasswordInput" v-model="form.current_password" type="password" class="mt-1 block w-full"
                />

                <InputError :message="form.errors.current_password" class="mt-2" />
            </div>

            <div>
                <v-text-field id="password" for="password" label="Nova Senha" ref="passwordInput" v-model="form.password" type="password" class="mt-1 block w-full"
                />

                <InputError :message="form.errors.password" class="mt-2" />
            </div>

            <div>
                <v-text-field id="password_confirmation" for="password_confirmation" label="Confirme sua senha" :rules="rules.password" v-model="form.password_confirmation" type="password" class="mt-1 block w-full"
                />

                <InputError :message="form.errors.password_confirmation" class="mt-2" />
            </div>

            <div class="flex items-center gap-4">
                <v-btn type="submit" color="tertiary" :disabled="form.processing">Salvar</v-btn>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm">Salvou.</p>
                </Transition>
            </div>
        </v-form>
    </section>
</template>

<script>
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';

export default {
    name: "UpdatePasswordForm",
    components: { InputError },
    data() {
        return {
            passwordInput: null,
            currentPasswordInput: null,
            form: useForm({
                current_password: '',
                password: '',
                password_confirmation: '',
            }),
            rules: {
                password: [
                    () => {
                        if(this.form.password !== this.form.password_confirmation) {
                            return 'Senhas diferentes'
                        }
                        return true;
                    }
                ]
            }
        }
    },
    methods: {
        updatePassword() {
            this.form.put(route('password.update'), {
                preserveScroll: true,
                onSuccess: () => this.form.reset(),
                onError: () => {
                    if (this.form.errors.password) {
                        this.form.reset('password', 'password_confirmation');
                        this.passwordInput.value.focus();
                    }
                    if (this.form.errors.current_password) {
                        this.form.reset('current_password');
                        this.currentPasswordInput.value.focus();
                    }
                },
            });
        }
    }
}
</script>

