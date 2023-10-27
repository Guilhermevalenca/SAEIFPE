<script>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Default from "@/Layouts/default/Default.vue";

export default {
  name: 'VerifyEmail',
  components: {Default, GuestLayout, Head, Link},
  props: {
    status: {
      type: String,
    },
  },
  data() {
    return {
      form: useForm({})
    }
  },
  methods: {
    submit() {
      this.form.post(route('verification.send'));
    }
  },
  computed: {
    verificationLinkSent() {
       return this.status === 'verification-link-sent';
    }
  }
}
</script>

<template>
    <Default>

      <GuestLayout>

        <Head title="Email Verification" />

        <div class="mb-4 text-sm text-gray-600">
          Obrigado por inscrever-se! Antes de começar, você poderia verificar seu endereço de e-mail clicando no link
          acabamos de enviar um e-mail para você? Se você não recebeu o e-mail, teremos prazer em lhe enviar outro.
        </div>

        <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
          Um novo link de verificação foi enviado para o endereço de e-mail que você forneceu durante o registro.
        </div>

        <v-form @submit.prevent="submit()">
          <div class="mt-4 flex items-center justify-between">
            <v-btn :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Reenviar email de verificação
            </v-btn>

            <Link :href="route('logout')" method="post" as="button" class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >Log Out</Link>
          </div>
        </v-form>

      </GuestLayout>

    </Default>
</template>
