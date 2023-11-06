<script>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Default from "@/Layouts/default/Default.vue";
export default {
  name: 'ResetPassword',
  components: {Default, GuestLayout, InputError, Head},
  props: {
    receivingProps: {
      email: {
        type: String,
        required: true,
      },
      token: {
        type: String,
        required: true,
      },
    }
  },
  data() {
    return {
      form: useForm({
        token: this.receivingProps.token,
        email: this.receivingProps.email,
        password: '',
        password_confirmation: '',
      })
    }
  },
  methods: {
    submit() {
      this.form.post(route('password.store'), {
        onFinish: () => this.form.reset('password', 'password_confirmation'),
      });
    }
  }
}
</script>

<template>
    <Default>

      <GuestLayout>
        <Head title="Reset Password" />

        <v-form @submit.prevent="submit()">
          <div>

            <v-text-field id="email" for="email" label="Email" type="email" class="mt-1 block w-full" v-model="form.email" required

            />

            <InputError class="mt-2" :message="form.errors.email" />
          </div>

          <div class="mt-4">

            <v-text-field id="password" for="password" label="Senha" type="password" class="mt-1 block w-full" v-model="form.password"
            />

            <InputError class="mt-2" :message="form.errors.password" />
          </div>

          <div class="mt-4">

            <v-text-field id="password_confirmation" for="password_confirmation" label="Confirme sua senha" type="password" class="mt-1 block w-full" v-model="form.password_confirmation"
            />

            <InputError class="mt-2" :message="form.errors.password_confirmation" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <v-btn color="secondary" type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Reset Password
            </v-btn>
          </div>
        </v-form>
      </GuestLayout>

    </Default>
</template>
