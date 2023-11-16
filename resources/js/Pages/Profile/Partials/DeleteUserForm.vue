<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium">Deletar conta</h2>

            <p class="mt-1 text-sm">
              Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Antes de excluir
              sua conta, baixe quaisquer dados ou informações que você deseja reter.
            </p>
        </header>
        <DangerButton @click="confirmUserDeletion">Deletar conta</DangerButton>

        <v-dialog width="900px" v-model="confirmingUserDeletion" @close="closeModal">
            <v-card>
              <div class="p-6">
                <h2 class="text-lg font-medium">
                  Tem certeza de que deseja excluir sua conta?
                </h2>

                <p class="mt-1 text-sm">
                  Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Por favor
                  digite sua senha para confirmar que deseja excluir permanentemente sua conta.
                </p>

                <div class="mt-6">
                  <v-text-field id="password" for="password" label="Senha" ref="passwordInput" v-model="form.password" type="password" placeholder="Digite sua senha"
                      @keyup.enter="deleteUser"
                  />

                  <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                  <SecondaryButton @click="closeModal"> Cancelar </SecondaryButton>

                  <DangerButton
                      class="ml-3"
                      :class="{ 'opacity-25': form.processing }"
                      :disabled="form.processing"
                      @click="deleteUser"
                  >
                      Deletar conta
                  </DangerButton>
                </div>
              </div>
            </v-card>
        </v-dialog>
    </section>
</template>
